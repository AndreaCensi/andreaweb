These videos shows a representation of the output of a dynamic vision sensor (DVS)
developed by [Tobi Delbruck][delbruck]'s group at the Institute for Neuroinformatics at 
ETH/University of Zurich. The data was collected at the [RPG lab][rpg] at University of Zurich with assistance from Jonas Strubel.

A **DVS** returns the data as a series of *events*
rather than frames. Each event corresponds to the change in luminance
of one pixel. For visualization only, the events are visualized as a histograms in a given time slice (below, the interval is 1/30, 1/1000, and 1/3000 of a second).
See these references for an introduction to the DVS technology:

- S. Liu and T. Delbruck, <em>Neuromorphic sensory systems</em> <a href="http://dx.doi.org/10.1016/j.conb.2010.03.00">DOI:10.1016/j.conb.2010.03.00</a>
- P. Lichtsteiner, C. Posch, T. Delbruck <em>A 128x128 120 dB 15  Latency Asynchronous Temporal Contrast Vision Sensor</em> <a href="http://dx.doi.org/10.1109/JSSC.2007.914337">DOI:10.1109/JSSC.2007.914337</a>

[delbruck]: http://www.ini.uzh.ch/~tobi/
[rpg]: http://rpg.ifi.uzh.ch


## Real-time video

In these videos, a Parrot quadcopter is seen from below by a DVS. There
are 4 blinking LEDs near the rotors as well.
This is the data rendered in real time (1 frame = 1/30 seconds).

<div class="flowplayer" data-ratio="0.38">
   <video src="https://purl.org/censi/research/2012-aer/l11.aedat-0.03.mp4"></video>
</div>
<a href="https://purl.org/censi/research/2012-aer/l11.aedat-0.03.mp4">Download mp4</a>

## 1 frame = 1 millisecond

This is the data rendered such that each frame shows the events 
arrived in 1 millisecond. Note that we can distinguish the rotations 
of the rotors.

<div class="flowplayer" data-ratio="0.38">
   <video src="https://purl.org/censi/research/2012-aer/l11.aedat-0.001.mp4"></video>
</div>
<a href="https://purl.org/censi/research/2012-aer/l11.aedat-0.001.mp4">Download mp4</a>

## 1 frame = 0.05 milliseconds

As the histogram interval gets smaller, fewer and fewer events are plotted.

<div class="flowplayer" data-ratio="0.38">
   <video src="https://purl.org/censi/research/2012-aer/l11.aedat-5e-05.mp4-active.mp4"></video>
</div>
<a href="https://purl.org/censi/research/2012-aer/l11.aedat-5e-05.mp4-active.mp4">Download mp4</a>
