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
    '\em': '',
    '{': '',
    '}': '',
    # {\em Drosophila}
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

def sub_names(s):

    people = json.load(open('people.json'))
    #print('loaded %d names' % len(people))

    s = s.replace('Andrea Censi', 'A.C.')

    # s = s.replace('Paloma de la Puente',
    #     "<a href='http://www.intelligentcontrol.es/paloma/'>Paloma de la Puente</a>")

    def combinations(first, last):
        comb = []
        comb.append( '%s %s' % (first, last))
        comb.append( '%s&nbsp;%s' % (first, last))
        comb.append( '%s %s' % (first[0], last))
        comb.append( '%s&nbsp;%s' % (first[0], last))
        # "#{first.split.join('&nbsp;')} #{last}"
        return list(set(comb))

    for p in people:
        first = p['first']
        last = p['family']
        site = p["site"]
        #face = p["face"]

        if not site:
            continue

        for sub in combinations(first, last):
            replace = "<a href='%s'>%s</a>" % (site, sub)
            s = s.replace(sub, replace)


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
    html = subs(html)
    html = sub_names(html)
    entries[k] = html
    

with open(sys.argv[2] + '.json', 'wb') as f:
    f.write(json.dumps(entries))


with open(sys.argv[2], 'wb') as f:
    yaml.safe_dump(entries, f,
                allow_unicode=True, encoding='UTF-8',
                default_style='"', line_break=False, width=10000,
                default_flow_style=False, explicit_start=True)
