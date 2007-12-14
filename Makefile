DIR=output/

WEBGEN=webgen

convert:
	ruby -rubygems -I~/maruku/lib -I$(WEBGEN)/lib $(WEBGEN)/bin/webgen run

#publish: convert
#	rsync -avzrL $(DIR)/* acensi@www.dis.uniroma1.it:public_html/

publish: 
	rsync -avzrL $(DIR)/* andrea@cds.caltech.edu:public_html/

check.html:
	linkchecker -ohtml --ignore-url=clsid:  --ignore-url=wikipedia --ignore-url=urchin.js output/index.html > $@

check: check.html
