#!/usr/bin/env ruby

s = $stdin.read
s = s.gsub(%r{<a name=".*"></a>},'')
s = s.gsub('Andrea Censi', '<strong>Andrea Censi</strong>')

puts s