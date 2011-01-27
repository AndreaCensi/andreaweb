#!/usr/bin/env ruby
require 'rubygems'
require 'json'
require 'erb'
require 'maruku'

db = File.open('db.json').read
list = JSON.parse(db)

list.each do |item|
	item['html_desc'] = Maruku.new(item['desc']).to_html
end
title = "my title"

while list.last['name'].to_s ==""; list.pop end
list = list.sort { rand}

input = File.read('page.rhtml')
eruby = ERB.new(input) 

File.open("index.html","w") do |f| 
	f.puts eruby.result(binding()) 
end
