DIR=output/

all: webgen

# convert:
# 	ruby -rubygems -I~/maruku/lib -I$(WEBGEN)/lib $(WEBGEN)/bin/webgen run 
# publish: 
#	rsync -avzrL $(DIR)/* andrea@cds.caltech.edu:public_html/

output/check.html:
	linkchecker -ohtml --ignore-url=clsid:	--ignore-url=wikipedia --ignore-url=urchin.js output/index.html > $@

check: output/check.html

sw=src/software.page

software: groups.yaml software.yaml $(sw).head
	python create_sw_page.py groups.yaml software.yaml $(sw).generated 
	cat $(sw).head $(sw).generated > $(sw)
	

webgen: software
	webgen