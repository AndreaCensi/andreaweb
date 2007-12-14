load_plugin 'webgen/plugins/tags/tag_processor'

require 'pstore'
require 'net/http'
require 'rexml/document'
require 'time'

# class FlickrExplorer is
# Copyright (C) 2004  Christian Neukirchen <http://purl.org/net/chneukirchen>

class FlickrExplorer
	CACHE = PStore.new("flickr-cache.pstore")

	def get_photo(apikey, username,id)
		photo = nil
		CACHE.transaction {
		  if CACHE[id].nil?
		  	puts "Fetching flickr data for #{username},#{id}..."
		
			 response = Net::HTTP.get("www.flickr.com",
			 "/services/rest/?method=flickr.photos.getInfo&api_key=#{apikey}&photo_id=#{id}")

			 xml = REXML::Document.new response
			
			 secret = xml.root.elements["/rsp/photo/@secret"].to_s;
			url_base = "http://static.flickr.com/" <<
				  xml.root.elements["/rsp/photo/@server"].to_s <<
				  "/" << id << "_" <<
				  xml.root.elements["/rsp/photo/@secret"].to_s;

			taken = xml.root.elements["/rsp/photo/dates/@taken"].to_s;
			# taken = '2005-10-29 15:37:07'
			s=taken.split(/:| |-/); 
			taken_time = Time.local(s[0],s[1],s[2],s[3],s[4],s[5])
			taken_friendly = taken_time.strftime("%A, %B #{taken_time.day}, %Y");

			 doc = REXML::Document.new  Net::HTTP.get("www.flickr.com",
			 "/services/rest/?method=flickr.photos.getSizes&api_key=#{apikey}&photo_id=#{id}")
			sizes={}
			doc.elements.each("//size") do |e|
				sizes[e.attributes['label']] = 
				{  :source => e.attributes['source'],
					:url => e.attributes['url'],
					:width => (e.attributes['width']).to_i,
					:height => (e.attributes['height']).to_i
				}
			end

			 photo = {
				"id" => id,
				"secret" => secret,
				"url_medium" => url_base + "_m.jpg",
				"url_large" => url_base + "_b.jpg",
				"url_small" => url_base + "_s.jpg",
				"url_original" => url_base + "_o.jpg",
				"description" => xml.root.elements["/rsp/photo/description"].text,
				"title" => xml.root.elements["/rsp/photo/title"].text,
				"creator" => xml.root.elements["/rsp/photo/owner/@username"].to_s,
				"taken" => xml.root.elements["/rsp/photo/dates/@taken"].to_s,
				"username" => username,
				"url_creator" => "http://www.flickr.com/photos/#{username}/",
				"url_photo" => "http://www.flickr.com/photos/#{username}/#{id}/",
				"taken" => taken, "taken_time" => taken_time, "taken_friendly" => taken_friendly,
				"sizes" => sizes
			 }
			 CACHE[id] = photo
			 puts "done."
		  else
			puts "Using cached data for #{username},#{id}..."
			photo = CACHE[id]
		  end
		}
		photo
	end
end

module Tags

  class FlickrTag < DefaultTag

	DefaultTemplate = %q{
	<div class="flickr">
	<a class="photo" href="<%= photo ['url_photo'] %>">
	<img src="<%= photo['url_medium'] %>" alt="<%= photo['title']%>"/>
	</a>
	<div  class="flipping" href="<%= photo['url_photo']%>">
	<span class="caption"><%= photo['title'] %></span> <br>
	<span class="taken">Taken by <a href="<%= photo['url_creator'] %>">
		<%= photo['creator']%></a> on <%= photo['taken_friendly']%>.
	</span><br>
	<span class="options">View <a href="<%= photo['url_large']%>">large</a> 
	      or <a href="<%= photo['url_original'] %>">original</a> size.
	</span>
	</div>
	</div>
}

    infos( :name => 'Tag/Flickr',
           :author => "Andrea Censi",
           :summary => "Formats a Flickr image"
           )

	param 'url', nil, 'Url of the photo on Flickr.'
	param 'template', DefaultTemplate, 'ERB template for the photo'
	param 'apikey', nil, 'Flickr api key'
	
	set_mandatory 'url', true
	
	register_tag 'flickr'

    def process_tag( tag, chain )
		url = param( 'url' )
		template = param('template')
		apikey = param('apikey')
		
		if not apikey
			raise "Please add apikey for Flickr."
		end
				
		if url =~ /http:\/\/www.flickr.com\/photos\/(\w*)\/(\w*)(\s*|\/\w*\s*)/
			user = $1; id = $2;
			photo = FlickrExplorer.new.get_photo(apikey, user, id)
			"\n\n" + ERB.new(template).result(binding) + "\n\n"
		else
			"Malformed URL: #{url.inspect}"
		end
    end

  end

end
