all: software.page software_body_wp.html

software.generated: groups.yaml software.yaml 
	python create_sw_page.py $^ $@

software.page: software.page.head legend.html software.generated
	cat $^ > $@

software_body_wp.html: legend.html software.generated
	cat $^ > $@