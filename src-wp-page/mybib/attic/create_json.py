#!/usr/bin/env python
import sys
import yaml
from pybtex.database import BibliographyData
from pybtex.database.input import bibtex
from StringIO import StringIO
from pybtex.database.output import bibtex as bibtexo
import json

filename = sys.argv[1]
out = sys.argv[2] 
parser = bibtex.Parser()
bib_data = parser.parse_file(filename)

writer = bibtexo.Writer()
entries = {}
for k,v in  bib_data.entries.items():
    bdata = BibliographyData()
    if 'desc' in v.fields:
        print('removing desc field of %r' % k)
        del v.fields['desc']
    bdata.entries[k] =v
    s = StringIO()
    writer.write_stream(bdata, s)
    bibtex = s.getvalue() 
    entries[k]  = bibtex

with open(out, 'wb') as f:
    f.write(json.dumps(entries))
