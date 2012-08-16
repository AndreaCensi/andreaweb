
all: all.yaml all.bib.yaml

src=../commons/bib/src-andrea


all.bib:  $(src)/web/regular.bib $(src)/web/preprints.bib
	cat $^ > $@


%.yaml: %.bib
	pybtex-convert $< $@

%.bib.yaml: %.bib
	python create_yaml.py  $< > $@
