#!/usr/bin/env ruby

s = $stdin.read

# bib?
s = s.gsub('pub_preprint.html#', '#')
s = s.gsub('pub_proc.html#', '#')

puts s