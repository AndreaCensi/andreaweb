load_plugin 'webgen/plugins/tags/tag_processor'


module Tags

  class PurlTag < DefaultTag

	DefaultTemplate = %q{
	<div class="purl">
		Please link here using this <a href="http://purl.org">PURL</a>: <%= purl %> 
	</div>
}

    infos( :name => 'Tag/Purl',
           :author => "Andrea Censi",
           :summary => "Writes a PURL banner if the page has one."
           )

	param 'template', DefaultTemplate, 'ERB template for the PURL banner'
	
	register_tag 'purl'
    def process_tag( tag, chain )
		template = param('template')

		if purl = chain.last.meta_info['PURL']
			ERB.new(template).result(binding)
		else
			""
		end
    end

  end

end
