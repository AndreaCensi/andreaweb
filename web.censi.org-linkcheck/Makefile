DIR=output/

main=http://andrea.caltech.edu/

all: check.html


check_opts=--ignore-url=clsid:	
check_opts+=--ignore-url=wikipedia 
check_opts+=--ignore-url=urchin.js
check_opts+=--ignore-url=fonts.googleapis.com
check_opts+=--ignore-url=www.linkedin.com
check_opts+=--ignore-url=wp-comments-post.php


check.html:
	echo "[filtering]\nignorewarnings=http-moved-permanent" > linkcheckerrc
	linkchecker -ohtml $(check_opts) $(main)  -f linkcheckerrc > $@

# output/check_purls.html:
# 	# add -v for verbose
# 	linkchecker -r 1  -ohtml $(check_opts) output/misc/purls.html > $@