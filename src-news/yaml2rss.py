import yaml, shutil, sys, time, markdown, urlparse
from string import Template
from BeautifulSoup  import BeautifulSoup

site_template = """<?xml version="1.0"?>
<rss version="2.0" 
        xmlns:content="http://purl.org/rss/1.0/modules/content/"
        xmlns:atom="http://www.w3.org/2005/Atom">
   <channel>
      <title>${title}</title>
      <link>${link}</link>
      <description>${description}</description>
      <lastBuildDate>${lastBuildDate}</lastBuildDate>
      <generator>yaml2rss</generator>
      <atom:link href="${rss_url}" rel="self" type="application/rss+xml" />
      
    ${items}


   </channel>
</rss>
"""

      # <webMaster>${webMaster}</webMaster>

entries_template = """
    <item>
         <title>${title}</title>
         <link>${link}</link>
         <description><![CDATA[${description}]]></description>
         <content:encoded><![CDATA[${description}]]></content:encoded>
         <pubDate>${pubDate}</pubDate>
         <guid isPermaLink="false">${guid}</guid>
     </item>
""" 


def main():
    data = sys.stdin.read()
    docs = list(yaml.load_all(data))
    channel = docs[0]
    entries = [e for e in docs[1:] if e]
    
    channel['lastBuildDate'] = format_date(time.localtime())

    items = ""
    for entry in entries:
        items += format_entry(entry, channel_link=channel['link'])
    
    rss = Template(site_template).substitute(channel, items=items)
    sys.stdout.write(rss) 

def format_date(t):
    return time.strftime("%a, %d %b %Y %H:%M:%S +0000", t)
    

def make_absolute(base, url):
    abs = urlparse.urljoin(base, url)
    return abs
    
def format_entry(entry, channel_link):
    
    try:
        entry['link'] = make_absolute(channel_link, entry['link'])

        md = entry['text']
        md += '\n\n[link]: %s' % entry['link']
        html = markdown.markdown(md)
        
        soup = BeautifulSoup(html)
        for a in soup('a'):
            a['href'] = make_absolute(channel_link, a['href'])

        html =  soup.prettify()

        # if 'extra_html' in entry:
        #           html += '\n\n' + entry['extra_html']
        date = format_date(entry['date'].timetuple())

        guid = "%s#%s" % (channel_link, entry['date'])
        entry['description'] = html
        entry['pubDate'] = date
        entry['guid'] = guid

        return Template(entries_template).substitute(entry)
        
    except:
        sys.stderr.write('Error while formatting entry: \n %r ' % entry)
        raise

if __name__ == '__main__':
    main()
    