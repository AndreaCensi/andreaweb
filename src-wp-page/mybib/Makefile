
all: all.yaml all.bib.json all.html.yaml

src=../../src-bib/commons/bib/src-andrea


all.bib:  $(src)/web/regular.bib $(src)/web/preprints.bib $(src)/web/future.bib
	cat $^ > $@


%.yaml: %.bib
	pybtex-convert $< $@

%.bib.json: %.bib
	python create_yaml.py $< $@

%.html.yaml: %.bib
	python format.py $< $@

