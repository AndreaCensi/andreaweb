
md=$(basename $(wildcard *.md))
targets=$(addsuffix .html, $(md))


all: $(targets)


tmp=tmp

%.html: %.md
	echo "CSS: style.css\n" > $(tmp)
	cat $< >> $(tmp)
	cat footer.md >> $(tmp)
	maruku -o $@ $(tmp)
	rm $(tmp)

src=/Users/andrea/scm-pri/my_website/src-wp-page
dst=ssh://andrea@web.censi.org/scm/andreaweb/src-wp-page

sync:
	unison src_wp_page -repeat 1 -dumbtty -terse -force $(src)
	