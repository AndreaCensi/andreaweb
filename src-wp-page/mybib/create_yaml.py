#!/usr/bin/env python
import sys
import yaml
from pybtex.database import BibliographyData
from pybtex.database.input import bibtex
from StringIO import StringIO
from pybtex.database.output import bibtex as bibtexo


filename = sys.argv[1]
parser = bibtex.Parser()
bib_data = parser.parse_file(filename)

writer = bibtexo.Writer()
entries = {}
for k,v in  bib_data.entries.items():
    bdata = BibliographyData()
    bdata.entries[k] =v
    s = StringIO()
    writer.write_stream(bdata, s)
    bibtex = s.getvalue() 
    entries[k]  = bibtex

yaml.safe_dump(entries, sys.stdout,
     allow_unicode=True, encoding='UTF-8',
        default_flow_style=False, explicit_start=True)
