
all: news.rss news.html
	cp news.rss ../src/
	cp news.rss ../output/

news.rss: news.yaml
	python yaml2rss.py rss < $< > $@

news.html: news.yaml
	python yaml2rss.py html < $< > $@



