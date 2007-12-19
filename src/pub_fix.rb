#!/usr/bin/env ruby

s = $stdin.read
s = s.gsub(%r{<a name=".*"></a>},'')
s = s.gsub('Andrea Censi', '<strong>Andrea Censi</strong>')

names = [
       {"first"=> "Andrea", "family"=> "Censi", "mysite"=>
"http://www.dis.uniroma1.it/~acensi/",
       "face"=> "http://www.dis.uniroma1.it/~acensi/data/legoland.jpg"},
       {"first"=> "Luca", "family"=> "Iocchi", "site"=>
"http://www.dis.uniroma1.it/~iocchi/",
       "face"=> "http://www.dis.uniroma1.it/~iocchi/stereo3d/images/lucaanim.gif"},
       {"first"=> "Daniele", "family"=> "Nardi", "site"=>
"http://www.dis.uniroma1.it/~nardi/",
       "face"=> "http://www.dis.uniroma1.it/~nardi/figure/daniele.jpg"},
       {"first"=> "Daniele", "family"=> "Calisi", "site"=>
"http://www.dis.uniroma1.it/~calisi/"},
       {"first"=> "Giorgio", "family"=> "Grisetti", "site"=>
"http://www.informatik.uni-freiburg.de/~grisetti/",
       "face"=> "http://www.informatik.uni-freiburg.de/~grisetti/pics/grisetti.jpg"},
       {"first"=> "Alessandro", "family"=> "Farinelli", "site"=>
"http://www.dis.uniroma1.it/~farinell/",
       "face"=> "http://www.dis.uniroma1.it/~farinell/assets/images/farinelli.jpg"},
      {"first"=> "Alessandro", "family"=> "De Luca", "site"=>
"http://www.dis.uniroma1.it/~labrob/people/deluca/deluca.html",
       "face"=> "http://www.dis.uniroma1.it/~labrob/people/deluca/pers/ADL.jpg"},
      {"first"=> "Giuseppe", "family"=> "Oriolo", "site"=>
"http://www.dis.uniroma1.it/~labrob/people/oriolo/oriolo.html",
       "face"=> "http://www.dis.uniroma1.it/~labrob/people/oriolo/oriolo.jpg"},
      {"first"=> "Gian Diego", "family"=> "Tipaldi", "site"=>
"http://www.dis.uniroma1.it/~tipaldi/",
       "face"=> "http://www.dis.uniroma1.it/~tipaldi/assets/images/Picture.JPG"},

 ]



def combinations(first, last)
	[ "#{first} #{last}",
	"#{first}&nbsp;#{last}",
	"#{first[0].chr}. #{last}",
	"#{first[0].chr}.&nbsp;#{last}",
"#{first.split.join('&nbsp;')} #{last}"
	]
end

for n in names
	face = n["face"]
	site = n["site"]
	first = n["first"]
	family = n["family"]

	for string in combinations(first,family)
		if site
			$stderr.puts string
		replace = "<a href='#{site}'>#{string}</a>"
		s = s.gsub(string,replace)
		end
	end
end


puts s