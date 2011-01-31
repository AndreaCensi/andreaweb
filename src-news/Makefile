
all: news.rss
	cp news.rss ../src/
	cp news.rss ../output/

news.rss: news.yaml
	python yaml2rss.py < $< > $@



