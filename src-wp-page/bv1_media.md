### Media
[video-calib]: http://purl.org/censi/2012/camera_calibration#media
[video-real]: http://purl.org/censi/research/2011-bgds/#sensels
[video-sim]: videos-vehicles


- Chapter 11: [Videos for calibration ][video-calib]
- Chapters 12-13: [Videos using the Vehicles simulations (exploration, servoing)][video-sim].
- Chapter 14: [Videos using real data (camera/range-finders on mobile robots)][video-real]



<div id="examples">
  <style type="text/css">
   div.examples { display: block; width: 100%;}
   div.examples div.video-example { display: block; float: left; width: 25%;}
   div.examples div.video-example { border: solid 1px black;}
  </style>
  <div class="video-example">
    <p class="caption">
      Calibration by correlation. 
    </p>
    <p class="other">
      <a href="http://purl.org/censi/2012/camera_calibration#media">See other videos for Chapter 11</a>
    </p>
    <object width="250" height="180"><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id=33843143&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=00adef&amp;fullscreen=1&amp;autoplay=0&amp;loop=1" /><embed src="http://vimeo.com/moogaloop.swf?clip_id=33843143&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=00adef&amp;fullscreen=1&amp;autoplay=0&amp;loop=1" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="250" height="180"></embed></object>
  </div>

  <div class="video-example">
    <p class="caption">
      Navigation using bootstrapped models. 
    </p>
    <p class="other">
      <a href="video-vehicles">See other videos for Chapters  12-13</a>
    </p>
    <object width="250" height="180"><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id=33843143&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=00adef&amp;fullscreen=1&amp;autoplay=0&amp;loop=1" /><embed src="http://vimeo.com/moogaloop.swf?clip_id=33843143&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=00adef&amp;fullscreen=1&amp;autoplay=0&amp;loop=1" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="250" height="180"></embed></object>
  </div>
</div>


### Software

All software is available for download from various GitHub projects
(I am working on a one-click installation for Amazon EC2; inquire if interested).

These are the main pieces:

- [boot12env](http://github.com/AndreaCensi/boot12env) is the "root" repository
  that contains scripts for setting up a virtual environment and 
  checking out the other packages.
- [BootOlympics](http://github.com/AndreaCensi/boot_olympics) 
  is the package responsible for interfacing agents and robots, 
  loading/saving data and running the benchmarks,
  such as prediction, servoing, etc.
  - [bvapps](http://github.com/AndreaCensi/bvapps)  contains the configuration
    files for the simulations/experiments.
  - [boot_agents](http://github.com/AndreaCensi/boot_agents)  contains the 
    implementation of the agents (BDS, BGDS, DDS, etc.).
- [PyVehicles](http://github.com/AndreaCensi/vehicles) is used
  to run the Vehicles simulations.
- [PyGeometry](http://github.com/AndreaCensi/geometry) implements
  all differential geometry functions.


These are miscellaneous utilities for creating reports, videos, and general plumbing:

- [procgraph](http://github.com/AndreaCensi/procgraph), for creating the videos.
- [reprep](http://github.com/AndreaCensi/reprep), for creating the reports.
- [latex_gen](http://github.com/AndreaCensi/latex_gen), for auto-generating the LaTeX reports (see Chapter 13).
- [pysnip](https://github.com/AndreaCensi/pysnip) for running Python from inside LaTeX.
- [compmake](http://github.com/AndreaCensi/compmake), for parallel computation.
- [conf_tools](http://github.com/AndreaCensi/conf_tools), for reading yaml 
  configuration.
- [PyContracts](http://github.com/AndreaCensi/contracts)