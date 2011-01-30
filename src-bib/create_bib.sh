#!/bin/bash
set -e
set -x

source='all.bib'

bib2bib -oc /dev/null  -ob pub_preprint.bib -c 'kind="preprint"' $source
bib2bib -oc /dev/null  -ob pub_proc.bib -c '!?kind' $source
bib2bib -oc /dev/null  -ob pub_tr.bib   -c 'kind="unref"' $source


# style="-s alpha"
flags="-dl -s ./bold-title.bst -nokeys -both -nodoc -nofooter -noheader -nf slides slides -nf videopageA videopage -nf videopageB videopage -nf otherlink otherlink -nf video video -nf url additional_material"
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
 
