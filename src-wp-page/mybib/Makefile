
all: all.extra.json 

# all.pybtex.yaml all.bib.json all.html.json

src=../../../commons/bib/src-andrea


all.bib: local.bib $(src)/web/regular.bib $(src)/web/preprints.bib $(src)/web/future.bib
	cat $^ > $@

# %.pybtex.yaml: %.bib
# 	pybtex-convert $< $@

# %.bib.json: %.bib
# 	python create_json.py $< $@

%.extra.json: %.bib
	python bibtex2extrajson.py $< $@


syncjson:
	rsync all.extra.json andrea@web.censi.org:scm/andreaweb/src-wp-page/mybib/
