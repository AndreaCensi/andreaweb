all: generated_source.bib
	./create_bib.sh $<

src=commons/bib/src-andrea

generated_source.bib:  $(src)/web/regular.bib $(src)/web/preprints.bib
	cat $^ > $@