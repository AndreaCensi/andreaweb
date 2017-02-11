from pybtex.style.template import field, join, optional
import sys
import copy
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

    s = s.replace('Andrea Censi', '<span class="author-ac">Andrea Censi</span>')

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

# Fields that should not be part of bibtex
special_fields = ['desc', 'descicon']

def get_bibtex_string(id_entry, entry):
    from pybtex.database.output import bibtex as bibtexo
    writer = bibtexo.Writer()
    bdata = BibliographyData()
    entry = copy.deepcopy(entry)
    for field in special_fields:
        if field in entry.fields:
            #print('removing %r field of %r' % (field, id_entry))
            del entry.fields[field]
    bdata.entries[id_entry] = entry
    s = StringIO()
    writer.write_stream(bdata, s)
    return s.getvalue()

def get_html_short(id_entry, entry):
    form = Style()
    s = form.format_entry(entry)
    from pybtex.backends.html import Backend
    backend = Backend()
    html = s.render(backend)
    html = subs(html)
    html = sub_names(html)
    return html

def get_entry_fields(id_entry, entry):
    def process_person_roles(entry):
        for role, persons in entry.persons.iteritems():
            yield role, list(process_persons(persons))

    def process_person(person):
        for type in ('first', 'middle', 'prelast', 'last', 'lineage'):
            name = person.get_part_as_text(type)
            if name:
                yield type, name

    def process_persons(persons):
        for person in persons:
            yield dict(process_person(person))
            
    fields = dict(entry.fields)
    fields['type'] = entry.type
    fields.update(process_person_roles(entry))
    return fields


filename = sys.argv[1]
parser = bibtex.Parser()
bib_data = parser.parse_file(filename)

writer = bibtexo.Writer()
entries = {}

order = 0
for id_entry, entry in  bib_data.entries.items(): 
    # if 'desc' in entry.fields:
    #     print entry.fields['desc'].__repr__()
    html_short = get_html_short(id_entry, entry)
    bibtex = get_bibtex_string(id_entry, entry)
    fields = get_entry_fields(id_entry, entry)
    entries[id_entry] = {'html_short': html_short,
                         'fields': fields,
                         'bibtex': bibtex,
                         'order': order}
    order += 1
    

with open(sys.argv[2], 'wb') as f:
    f.write(json.dumps(entries, indent=True))


# with open(sys.argv[2], 'wb') as f:
#     yaml.safe_dump(entries, f,
#                 allow_unicode=True, encoding='UTF-8',
#                 default_style='"', line_break=False, width=10000,
#                 default_flow_style=False, explicit_start=True)
