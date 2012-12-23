<div style='float: right; margin: 1em; border: solid 2px #eee;'>
<object width="320" height="200"><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id=19263374&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=00ADEF&amp;fullscreen=1&amp;autoplay=1&amp;loop=1" /><embed src="http://vimeo.com/moogaloop.swf?clip_id=19263374&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=00ADEF&amp;fullscreen=1&amp;autoplay=1&amp;loop=1" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="320" height="200"></embed></object> 
</div>

My thesis work is about the *bootstrapping* problem: learning a model of a robot's sensorimotor cascade, and its environment, from zero prior information other than basic semantic. At the beginning, we only assume to have uninterpreted streams of bits representing the output of some sensors, and that we have some commands available, and that there is some causal relation from actions to observations. The situation is very similar to the video on the right.

Other than a worthy problem per se (it subsumes most problems of learning, calibration, fault detection, etc.), it is also a proxy for studying some aspects of the higher level of neural processing. In fact, it is believed that the cortex starts as a *tabula rasa* that adapts to the inputs (the evidence is that parts of it can be repurposed in subjects that lost some sensory capacity).


At this point, it is not clear if an agent can learn everything from the environment, or if there is something that should be known a priori. My goal has been to try to derive some precise formulation of the problem, and to find strong results (in the spirit of control theory) that can be built upon.


<!--
Representative papers:

- [Bootstrapping, uncertain semantics, and invariance (PDF)][semantics]   (preprint)
- [A group-theoretic approach to formalizing bootstrapping problems (PDF)][bgds_tr]  (preprint)
- [Bootstrapping bilinear models of sensorimotor cascades][bds] (ICRA'11)
-->

[bgds_tr]: http://purl.org/censi/2011/bgds_tr
[semantics]: http://purl.org/censi/research/2011-icdl-invariance.pdf



<div style='float: right; margin: 1em; border: solid 2px #eee; clear: right'>
<object width="320" height="276"><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id=19271333&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=00ADEF&amp;fullscreen=1&amp;autoplay=1&amp;loop=1" /><embed src="http://vimeo.com/moogaloop.swf?clip_id=19271333&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=00ADEF&amp;fullscreen=1&amp;autoplay=1&amp;loop=1" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="320" height="276"></embed></object> 
</div>


*Video*: The video shows learning of a bilinear model of a sensorimotor cascade for a camera. The agent starts with no previous knowledge on the sensor geometry, and by correlating observations with commands, it can learn a generative model for the data. The same model can be used for learning the dynamics of different sensors (range-finder, camera, field sampler).
See [many other videos][bevideos] of related experiments.

### Dissertation

[pub_ref_desc id='censi12phd']


### Recent papers on boostrapping


[pub_ref_desc id='censi12dptr1_preprint']
[pub_ref_desc id='censi12cameracalib_preprint']

<div style='float:right; color: red; padding: 5px'> (best student <br/> paper finalist)</div>
[pub_ref_desc id='censi12fault']

The following are already included in my dissertation:

[pub_ref_desc id='censi12diffeo'] 
[pub_ref_desc id='censi11semantics']
[pub_ref_desc id='censi11bgds']


<div style='float:right; color: red; padding: 5px'> (best conference <br/> paper finalist) </div>
[pub_ref_desc id='censi11bds']


[bevideos]: http://purl.org/censi/research/2011-bgds/

[bevideos_old]: http://purl.org/censi/2010/be
[bds]: http://purl.org/censi/2010/boot

[many other videos]: bevideos

<div style='clear: both'></div>