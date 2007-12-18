
bib2bib -oc proc -ob pub_proc.bib -c '$type="INPROCEEDINGS"' research/all.bib
bib2bib -oc tr -ob pub_tr.bib -c '$type<>"INPROCEEDINGS"' research/all.bib


bibtex2html -dl -s alpha -nokeys -both -nodoc -nofooter -noheader pub_proc.bib
bibtex2html -dl -s alpha -nokeys -both -nodoc -nofooter -noheader pub_tr.bib

cat pub_head.txt pub_proc.html pub_middle.txt pub_tr.html | ./pub_fix.rb > publications.page

#bibtex2html -s ieeetr -both -nodoc research/all.bib

#cp all.html all.page
#rm all.html