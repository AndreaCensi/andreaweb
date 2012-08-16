# from pybtex.style.formatting import FormatterBase, toplevel
from pybtex.style.template import field, join, optional

# class Formatter(FormatterBase):
#     def format_article(self, entry):
#         if entry.fields['volume']:
#             volume_and_pages = join [field('volume'), optional [':', pages]]
#         else:
#             volume_and_pages = words ['pages', optional [pages]]
#         template = toplevel [
#             self.format_names('author'),
#             sentence [field('title')],
#             sentence [
#                 tag('emph') [field('journal')], volume_and_pages, date],
#         ]
#         return template.format_data(e)


import sys
import yaml
from pybtex.database import BibliographyData
from pybtex.database.input import bibtex
from StringIO import StringIO
from pybtex.database.output import bibtex as bibtexo
from pybtex.style.formatting.plain import *


filename = sys.argv[1]
parser = bibtex.Parser()
bib_data = parser.parse_file(filename)

writer = bibtexo.Writer()
entries = {}

for k,v in  bib_data.entries.items(): 
    form = Style()
#    print v
    # form = Formatter()
    s = form.format_entry(v)
    from pybtex.backends.html import Backend
    backend = Backend()
    html = s.render(backend)
    entries[k] = html
    print ('---')
    print html


with open(sys.argv[2], 'wb') as f:
    yaml.safe_dump(entries, f,
                allow_unicode=True, encoding='UTF-8',
                default_flow_style=False, explicit_start=True)
