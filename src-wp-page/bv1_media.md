### Media
[video-calib]: https://purl.org/censi/2012/camera_calibration#media
[video-real]: https://purl.org/censi/research/2011-bgds/#sensels
[video-sim]: videos-vehicles


- Chapter 11: [Videos for calibration ][video-calib]
- Chapters 12-13: [Videos using the Vehicles simulations (exploration, servoing)][video-sim].
- Chapter 14: [Videos using real data (camera/range-finders on mobile robots)][video-real]



<div id="examples">
  <style type="text/css">
   div#examples { display: block; width: 100%; overflow: auto;}
   div#examples div.example { display: block; float: left !important; width: 25% !important; margin: 1em;}
   /*div#examples div.example { border: solid 1px black !important;}*/
   div#examples div.example p.caption { height: 3em; padding: 0; font-style: italic; margin: 0;}
   div#examples div.example p.other { text-align: right; width: 90%; height: 2em;}
   div#examples div.example p.other:before { content: "→";}
   div#examples div.example div.frame { display: block; height: 200px; vertical-align: middle;}
  </style>
  <div class="example">
    <p class="caption">
      Data used for calibration by correlation. 
    </p>
    <div class="frame">
    <object width="250" height="160"><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="https://vimeo.com/moogaloop.swf?clip_id=33843143&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=00adef&amp;fullscreen=1&amp;autoplay=0&amp;loop=1" /><embed src="https://vimeo.com/moogaloop.swf?clip_id=33843143&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=00adef&amp;fullscreen=1&amp;autoplay=0&amp;loop=1" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="250" height="180"></embed></object>
  </div>
    <p class="other">
      <a href="https://purl.org/censi/2012/camera_calibration#media">other videos <br/>for Chapter 11</a>
    </p>
</div>

<div class="example">
    <p class="caption">
      Vehicles navigation using bootstrapped models. 
    </p>
    <div class="frame">
    <div data-ratio='0.552' class="flowplayer is-splash color-light"
        style="background: #000 url('https://purl.org/censi/research/2012-bv1bds1/videos/splash/Se0Vdd1ro-bdse3-ep_servonav_bdse3_00000-mp4f2sr.png') 0 0 no-repeat; background-size: 100%;">
        <video preload="none" 
               src="https://purl.org/censi/research/2012-bv1bds1/videos/bv1servo1/videos/Se0Vdd1ro-bdse3-ep_servonav_bdse3_00000-mp4f2sr.mp4">
        </video>
    </div>
    </div>
    <p class="other">
      <a href="videos-vehicles">other videos <br/>for Chapters 12-13</a>
    </p>
  </div>

    <div class="example">
    <p class="caption">
      Larning BGDS model with streaming data
    </p>
    <div class="frame">
<!--       1564x494 
 -->    <div data-ratio='0.315' class="flowplayer is-splash color-light"
        style="background: #000 url('https://purl.org/censi/research/2011-bgds/videos/sickpca_tensors.mp4.realsize.png') 0 0 no-repeat; background-size: 100%;">
        <video preload="none" 
               src="https://purl.org/censi/research/2011-bgds/videos/sickpca_tensors.mp4">
        </video>
    </div>
    </div>
      <p class="other">
      <a href="https://purl.org/censi/research/2011-bgds/#sensels">other videos <br/>for Chapter 14+</a>
    </p>
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