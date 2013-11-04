#!/usr/bin/env ruby

s = $stdin.read

s = s.gsub('<p><a name="censi11bds"></a>', 
           "<p> <div style='float:right; color: red; padding: 5px'> (best conference <br/> paper finalist) </div>") 

s = s.gsub('<p><a name="censi12fault"></a>', 
           "<p> <div style='float:right; color: red; padding: 5px'> (best student <br/> paper finalist) </div>") 


s = s.gsub(%r{<a name=".*"></a>},'')
mystring="A.C."
s = s.gsub('Andrea Censi', mystring)
s = s.gsub('A. Censi', mystring)
s = s.gsub('A.&nbsp;Censi', mystring)

# Make everything on the same page

# main
s = s.gsub('pub_preprint_bib.html#', '#')
s = s.gsub('pub_proc_bib.html#', '#')
s = s.gsub('pub_tr_bib.html#', '#')



names = [
  # {"first"=> "Chris", 
  #  "family"=> "Scrapper", 
  #  "site"=>"http://www.intelligentcontrol.es/paloma/"},
  {"first" => "Kostas",
    "family" => "Daniilidis",
    "site" => "http://www.cis.upenn.edu/~kostas/"
    },
  {"first" => "Davide",
    "family" => "Scaramuzza",
    "site" => "http://robotics.ethz.ch/~scaramuzza/Davide_Scaramuzza.htm"
    },
  {"first" => "Antonio",
    "family" => "Franchi",
    "site" => "http://antoniofranchi.com/robotics/"
    },
 {"first" => "Michael H.",
    "family" => "Dickinson",
    "site" => "http://www.dickinson.caltech.edu/"
    },
  {"first"=> "Paloma", 
   "family"=> "", 
   "site"=>"http://www.intelligentcontrol.es/paloma/"},

  {"first"=> "Raj", 
   "family"=> "Madhavan", 
   "site"=>"http://www.isr.umd.edu/faculty/gateways/madhavan.htm"},

  {"first"=> "Rolf", 
   "family"=> "Lakaemper", 
   "site"=>"http://knight.temple.edu/~lakaemper/"},
  
  {"first"=> "Afzal", 
   "family"=> "Godil", 
   "site"=>"http://zing.ncsl.nist.gov/godil/"},

  {"first"=> "Adam", 
   "family"=> "Jacoff", 
   "site"=>"http://www.nist.gov/el/isd/ms/jacoff.cfm"},
  # 
  # {"first"=> "Asim", 
  #  "family"=> "Wagan", 
  #  "site"=>"http://www.intelligentcontrol.es/paloma/"},

  {"first"=> "Paloma", 
   "family"=> "De La Puente", 
   "site"=>"http://www.intelligentcontrol.es/paloma/"},
   
  {"first"=> "Andrew D.", "family"=> "Straw", "site"=> "http://strawlab.org"},
  {"first"=> "Shuo", "family"=> "Han", "site"=> "http://purl.org/hanshuo"},
  {"first"=> "Stefano", "family"=> "Carpin", "site"=> "http://robotics.ucmerced.edu/"},
  {"first"=> "Sawyer B.", "family"=> "Fuller", "site"=> "http://xenia.media.mit.edu/~minster/"},
  {"first"=> "Richard M.", "family"=> "Murray", "site"=> "http://www.cds.caltech.edu/~murray/"},
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
      {"first"=> "Alessandro", 
        "family"=> "De Luca", "site"=>
"http://www.dis.uniroma1.it/~deluca/",
       "face"=> "http://www.dis.uniroma1.it/~deluca/pers/ADL.jpg"},
      {"first"=> "Giuseppe", "family"=> "Oriolo", "site"=>
"http://www.dis.uniroma1.it/~oriolo/",
       "face"=> "http://www.dis.uniroma1.it/~oriolo/oriolo.jpg"},
       {"first"=> "Luca", "family"=> "Marchionni", "site"=>
     "http://www.linkedin.com/in/lucamarchionni",
        "face"=> ""},
      {"first"=> "Gian Diego", "family"=> "Tipaldi", "site"=>
"http://www.informatik.uni-freiburg.de/~tipaldi",
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
      # $stderr.puts string
		  replace = "<a href='#{site}'>#{string}</a>"
		  s = s.gsub(string,replace)
		end
	end
end

s = s.gsub(%r{>bib},">bibtex")

s = s.gsub(%r{>.pdf},"><img style='border:0; margin-bottom:-6px'  src='/media/pdf.gif'/> pdf")
s = s.gsub(%r{>http},"><img style='border:0; margin-bottom:-6px'  src='/media/pdf.gif'/> pdf")

# s = s.gsub(%r{\$(.*)>otherlink},"'>$1QUI")


s = s.gsub(%r{>additional_material},"><img style='border:0; margin-bottom:-6px; height: 17px'  src='/media/web.gif'/> supp. material")
s = s.gsub(%r{>slides},"><img style='border:0; margin-bottom:-6px; height: 17px;'  src='/media/slides2.gif'/> slides")

s = s.gsub(%r{>video},"><img style='border:0; margin-bottom:-6px; height: 17px;'  src='/media/video1.png'/> video")
s = s.gsub(%r{>http},"><img style='border:0; margin-bottom:-6px; height: 17px;'  src='/media/video1.png'/> video")

if false
$stderr.puts "substituting titles"
s = s.gsub(/\n([^\n]*)\n  (In|Tech|Proc)/m) do |m|
  $stderr.puts m.inspect
	"<span class='title'>#{m[1]}</span>\n#{m[2]}"
end
end

# s = s.gsub('California<br/>', 'California')
	
s = s.gsub(/\n  In /m, "<br/> In ") 

if false
	s = s.gsub(/\n  In/m, "</span><br/> In") 
s = s.gsub(/(\D\.)\n/m) do |m| 
		#$stderr.puts m.inspect
	"#{m}<span class='title' style='color: blue'>" end
end



s = s.gsub(/www:/m, "webpage / additional material")


s = s.gsub('>Abstract</a>',' class="abstract-link">Abstract</a>')

puts s