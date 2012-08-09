#!/usr/bin/env ruby

s = $stdin.read

# bib?
s = s.gsub('pub_preprint.html#', '#')
s = s.gsub('pub_proc.html#', '#')
s = s.gsub('pub_tr.html#', '#')

puts s