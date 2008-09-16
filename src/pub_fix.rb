#!/usr/bin/env ruby

s = $stdin.read
s = s.gsub(%r{<a name=".*"></a>},'')
mystring="A.C."
s = s.gsub('Andrea Censi', mystring)
s = s.gsub('A. Censi', mystring)

names = [
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
       {"first"=> "Luca", "family"=> "Marchionni", "site"=>
     "http://www.linkedin.com/in/lucamarchionni",
        "face"=> ""},
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
	].uniq
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

s = s.gsub(%r{>.pdf},"><img style='border:0; margin-bottom:-6px'  src='pdf.gif'/> pdf")

if false
$stderr.puts "substituting titles"
s = s.gsub(/\n([^\n]*)\n  (In|Tech|Proc)/m) do |m|
	$stderr.puts m.inspect
	"<span class='title'>#{m[1]}</span>\n#{m[2]}"
end
end

	
s = s.gsub(/\n  In/m, "<br/> In") 

if false
	s = s.gsub(/\n  In/m, "</span><br/> In") 
s = s.gsub(/(\D\.)\n/m) do |m| 
		#$stderr.puts m.inspect
	"#{m}<span class='title' style='color: blue'>" end
end



s = s.gsub(/www:/m, "webpage / additional material")


puts s