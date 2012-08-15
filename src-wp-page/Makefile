
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