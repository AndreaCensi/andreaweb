DIR=output/

all: webgen

# convert:
# 	ruby -rubygems -I~/maruku/lib -I$(WEBGEN)/lib $(WEBGEN)/bin/webgen run 

publish: 
	# rsync -avzrL $(DIR)/* andrea@cds.caltech.edu:public_html/
	rsync -avzrL $(DIR)/* ender@v-cds-server1.caltech.edu:public_html/

output/check.html:
	linkchecker -ohtml --ignore-url=clsid:	--ignore-url=wikipedia --ignore-url=urchin.js output/index.html > $@

output/check_web.html:
	linkchecker -ohtml --ignore-url=clsid:	--ignore-url=wikipedia --ignore-url=urchin.js http://www.cds.caltech.edu/~ender/ > $@

check: output/check.html

src_software=src-software
src_bib=src-bib
src_news=src-news

src/software.page: $(src_software)/*
	make -C $(src_software)
	cp $(src_software)/software.page $@

src/publications.page: $(src_bib)/all.bib  $(src_bib)/*.txt
	make -C $(src_bib)
	cp $(src_bib)/pub_proc.html     src/
	cp $(src_bib)/pub_preprint.html src/
	cp $(src_bib)/pub_tr.html       src/
	cp $(src_bib)/pub_proc_bib.html     src/
	cp $(src_bib)/pub_preprint_bib.html src/
	cp $(src_bib)/pub_tr_bib.html       src/
	cp $(src_bib)/pub_proc_abstracts.html     src/
	cp $(src_bib)/pub_preprint_abstracts.html src/
	cp $(src_bib)/pub_tr_abstracts.html       src/
	cp $(src_bib)/all.bib           src/
	cp $(src_bib)/publications.page src/

src/news.rss: $(src_news)/*
	make -C $(src_news)

src/index.html: src-index
	cp src-index/index.html $@

src-index:
	make -C $@


webgen: src/publications.page src/news.rss src/software.page src/index.html
	webgen
