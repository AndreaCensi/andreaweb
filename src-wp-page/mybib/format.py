from pybtex.style.template import field, join, optional
 

import sys
import yaml
from pybtex.database import BibliographyData
from pybtex.database.input import bibtex
from StringIO import StringIO
from pybtex.database.output import bibtex as bibtexo
from pybtex.style.formatting.plain import *
import json

def subs(s):
    x = {
    '{': '',
    '}': '',
    '&nbsp;': ' ',
    '>pdf': "><img style='border:0; margin-bottom:-6px'  src='/media/pdf.gif'/> pdf",
    '>http': "><img style='border:0; margin-bottom:-6px'  src='/media/pdf.gif'/> pdf",
    '>url': "><img style='border:0; margin-bottom:-6px; height: 17px'  src='/media/web.gif'/> supp. material",
    '>slides': "><img style='border:0; margin-bottom:-6px; height: 17px;'  src='/media/slides2.gif'/> slides",
    '>video': "><img style='border:0; margin-bottom:-6px; height: 17px;'  src='/media/video1.png'/> video",
    }
    for k,v in x.items():
        s = s.replace(k,v)
    
    return s

filename = sys.argv[1]
parser = bibtex.Parser()
bib_data = parser.parse_file(filename)

writer = bibtexo.Writer()
entries = {}

for k,v in  bib_data.entries.items(): 
    form = Style()
    s = form.format_entry(v)
    from pybtex.backends.html import Backend
    backend = Backend()
    html = s.render(backend)
    entries[k] = subs(html)
    

with open(sys.argv[2] + '.json', 'wb') as f:
    f.write(json.dumps(entries))


with open(sys.argv[2], 'wb') as f:
    yaml.safe_dump(entries, f,
                allow_unicode=True, encoding='UTF-8',
                default_style='"', line_break=False, width=10000,
                default_flow_style=False, explicit_start=True)
