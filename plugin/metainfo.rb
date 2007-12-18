
load_plugin 'webgen/plugins/tags/tag_processor'


  class MetaInfo < Tags::DefaultTag

    infos( :name => 'Tag/MetaInfo',
           :author => 'Andrea Censi',
           :summary => 'Writes the content of the "description","author","keywords"'+ 
                       ' as META tags.')

    register_tag 'metainfo'

    def process_tag( tag, chain )
      cur_node = chain.last

      s = ""
      ['description', 'author', 'keywords'].each do |key|
         if value = cur_node.meta_info[key]
            value = CGI::escapeHTML(value)
            s += "<meta name='#{key}' content='#{value}'/>\n"
         end
      end
      s
    end

  end
