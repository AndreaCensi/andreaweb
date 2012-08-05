#!/bin/bash
set -e
set -x
source="$1"


bib2bib --remove abstract --no-comment -oc /dev/null  -ob pub_preprint.bib -c 'kind="preprint"' $source
bib2bib  --remove abstract --no-comment -oc /dev/null  -ob pub_proc.bib -c '!?kind' $source
bib2bib  --remove abstract --no-comment -oc /dev/null  -ob pub_tr.bib   -c 'kind="unref"' $source


# style="-s alpha"
flags="-noabstract -dl -s ./bold-title.bst -nokeys -both -nodoc -nofooter -noheader -nf slides slides -nf videopageA videopage -nf videopageB videopage -nf otherlink otherlink -nf video video -nf url additional_material"
bibtex2html $flags pub_preprint.bib
bibtex2html $flags pub_proc.bib
bibtex2html $flags pub_tr.bib

cat pub_head.txt           \
	pub_preprint_intro.txt \
	pub_preprint.html      \
	pub_proc_intro.txt     \
	pub_proc.html          \
	pub_tr_intro.txt       \
	pub_tr.html | ./pub_fix.rb > publications.page

cat pub_preprint_intro.txt \
    pub_preprint.html      \
    pub_proc_intro.txt     \
    pub_proc.html          \
    pub_tr_intro.txt       \
    pub_tr.html | ./pub_fix.rb > publications_inner.html

echo "<div id='bibtex'>" > bibtex.html
cat pub_preprint_bib.html pub_proc_bib.html pub_tr_bib.html | ./bib_fix.rb >> bibtex.html
echo "</div>" >> bibtex.html
