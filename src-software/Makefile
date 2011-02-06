all: software.page

software.generated: groups.yaml software.yaml 
	python create_sw_page.py $^ $@

software.page: software.page.head software.generated
	cat $^ > $@
