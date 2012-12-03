<style type='text/css'>
  blockquote { color: gray; text-align: right; font-style:italic; margin-top: -2em; text-align: center};
 #problems, #approaches, #theories { padding: 0 1.5em 0 0.5em; margin: 0;}
 #problems{ width: 45%; float: left;  clear: left; margin-right: 2em;}
 #approaches {width: 45%; float: left;}
 #theories { width: 45%; float: left;  clear: left;}
 #theories { margin-top: 1em;}


 #after { clear: both;}
 h4 { border-bottom: solid 3px #b00; padding-bottom: 5px}
 h5 { font-size: 1.2em; color: #b00; text-align: center; 
     }
.video { float: right; margin: 1em; border: solid 2px #eee;}
.video_caption { font-style: italic; font-size: 95%}
</style>

> Ah, la recherche! Du temps perdu.
> [(source)](http://projecteuclid.org/euclid.em/1062620828)

This is a summary of my general research interests, 
along with some highlights of recent activity.

<div id='problems' markdown=1>

##### General problem domains

My main interest lies in **robotics**, which, from my point of view, includes all 
interactions of an intelligent agent with the real world. I believe that in my
lifetime robotics will lead to some form of [strong AI], and I hope to retire as a [robopsychologist]. While I'm waiting for that to happen, I'm particularly interested in **perception** problems.
  
  <!-- Inspiration: Asimov. I know, it's fiction, but I wouldn't be doing this without his books. -->
  
I am fascinated by **cybernetics**, [in its original meaning][wiener] of 
comparative study of artificial and neural information processing:
nature's solutions are often much more robust than the current state
of the art.
  
  <!-- Inspiration: [Cybernetics: Or the Control and Communication in the Animal and the Machine][wiener] -->

</div>

<div id='approaches' markdown=1>

##### Approach / philosophy

**Simple** [is better than][vehicles] complicated. In robotics
applications, this means staying close to the measurement space.

**Formal** is [is better than][Dijkstra] informal.
Also, "formal" usually implies "simple", because you usually can prove something
only if it is simple enough.

**Data** before models, as long as formal results can still be proved.

**Open** is better than closed.
[Reproducible research][repres] is a worthy goal.
I predict that, in 15 years, it will be unthinkable to publish
in engineering research or computational sciences without publishing
the full source code and data. 

</div>

  <!-- (Control community ) -->
  <!-- Inspiration: Hinton's networks -->
  <!-- publishing in the future -->


<div style='display: none' id='theories' markdown=1>

#####  Favorite theories and methods

My first love is **estimation and filtering**. 
At Caltech I was infected with people's enthusiasm
on differential **geometry**.

When you apply *geometry* to *estimation*  you get  **information geometry** ([Wikipedia summary][araki], [serious introduction][cosma]).  
When you apply *estimation* to *geometry* you get **intrinsic estimation**
(see for example the
[theory of shape spaces][kendall], and [my favorite paper][smith]).  

I'm interested in both combinations (and both will provide a lifetime learning experience).

[cosma]: http://cscs.umich.edu/~crshalizi/notebooks/info-geo.html

</div>

<div style='clear: both'></div>


Keep reading for some highlights from my research, or read my [publications] list.


[information_spaces]: http://msl.cs.uiuc.edu/~lavalle/
[araki]: http://en.wikipedia.org/wiki/Information_geometry
[vehicles]: http://en.wikipedia.org/wiki/Valentino_Braitenberg
[Dijkstra]: http://www.cs.utexas.edu/users/EWD/
[kendall]: http://www.jstor.org/stable/2245331
[smith]: http://ieeexplore.ieee.org/xpls/abs_all.jsp?arnumber=1420804
[wiener]: http://en.wikipedia.org/wiki/Norbert_Wiener
[Strong AI]: http://en.wikipedia.org/wiki/Strong_AI
[robopsychologist]: http://en.wikipedia.org/wiki/Robopsychology
[repres]: http://www.reproducibleresearch.net

<!-- or [information spaces][information_spaces]. -->

#### Highlight - Bootstrapping Vehicles


<div style='float: right; margin: 1em; border: solid 2px #eee;'>
<object width="320" height="200"><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id=19263374&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=1&amp;color=00ADEF&amp;fullscreen=1&amp;autoplay=0&amp;loop=0" /><embed src="http://vimeo.com/moogaloop.swf?clip_id=19263374&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=1&amp;color=00ADEF&amp;fullscreen=1&amp;autoplay=0&amp;loop=0" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="320" height="200"></embed></object> 
</div>

My thesis work is about the *bootstrapping* problem: learning a model of a robot's sensorimotor cascade, and its environment, from zero prior information other than basic semantic. At the beginning, we only assume to have uninterpreted streams of bits representing the output of some sensors, and that we have some commands available, and that there is some causal relation from actions to observations. The situation is very similar to the video on the right.

Other than a worthy problem per se (it subsumes most problems of learning, calibration, fault detection, etc.), it is also a proxy for studying some aspects of the higher level of neural processing. In fact, it is believed that the cortex starts as a *tabula rasa* that adapts to the inputs (the evidence is that parts of it can be repurposed in subjects that lost some sensory capacity).


At this point, it is not clear if an agent can learn everything from the environment, or if there is something that should be known a priori. My goal has been to try to derive some precise formulation of the problem, and to find strong results (in the spirit of control theory) that can be built upon.


- [Slides (PDF) from my defense](http://purl.org/censi/research/201206-defense.pdf)

<!--
Representative papers:

- [Bootstrapping, uncertain semantics, and invariance (PDF)][semantics]   (preprint)
- [A group-theoretic approach to formalizing bootstrapping problems (PDF)][bgds_tr]  (preprint)
- [Bootstrapping bilinear models of sensorimotor cascades][bds] (ICRA'11)
-->

[bgds_tr]: http://purl.org/censi/2011/bgds_tr
[semantics]: http://purl.org/censi/research/2011-icdl-invariance.pdf



<div style='float: right; margin: 1em; border: solid 2px #eee; clear: right'>
<object width="320" height="276"><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id=19271333&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=1&amp;color=00ADEF&amp;fullscreen=1&amp;autoplay=0&amp;loop=0" /><embed src="http://vimeo.com/moogaloop.swf?clip_id=19271333&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=1&amp;color=00ADEF&amp;fullscreen=1&amp;autoplay=0&amp;loop=0" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="320" height="276"></embed></object> 
</div>


*Video*: The video shows learning of a bilinear model of a sensorimotor cascade for a camera. The agent starts with no previous knowledge on the sensor geometry, and by correlating observations with commands, it can learn a generative model for the data. The same model can be used for learning the dynamics of different sensors (range-finder, camera, field sampler).
See [many other videos][bevideos] of related experiments.


[bevideos]: http://purl.org/censi/2010/be
[bds]: http://purl.org/censi/2010/boot

[many other videos]: bevideos

<div style='clear: both'></div>

#### Highlight - Identification of visually-guided behavior in Drosophila Melanogaster

I have been collaborating with [the Dickinson lab], in particular with [Andrew Straw][straw] (who now has his own lab at the Institute of Molecular Pathology in Vienna, Austria) on the quantitative characterization of visually-driven behavior in Drosophila Melanogaster.



<div style='float: right; margin: 1em; border: solid 2px #eee;'>
<object width="320" height="276"><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id=19194748&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=1&amp;color=00ADEF&amp;fullscreen=1&amp;autoplay=0&amp;loop=0" /><embed src="http://vimeo.com/moogaloop.swf?clip_id=19194748&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=1&amp;color=00ADEF&amp;fullscreen=1&amp;autoplay=0&amp;loop=0" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="320" height="276"></embed></object> 
</div>

The video  shows the kind of simulated
data I am working with. Using [a special apparatus][mamarama] with 11 cameras, the animal is tracked with a precision of a few millimiters. An ad-hoc simulator allows to reconstruct the visual stimulus experienced by the animal at a reasonable level of accuracy.

We then analyze the data asking whether we can infer the neural processing happening in the animal brain.


Video: Simulated visual input from tracking data of free-flying Drosophila Melanogaster ([watch on Vimeo][video_fly]). On the right, you can see the simulated visual stimulus. On the left, the position of the fly in the arena (1m radius). Note that the video is slowed down about 10x with respect to the real data: fruit flies are very fast! (real time is in the left corner) Watch the video full-screen to appreciate the details. 
 
[video_fly]: http://vimeo.com/19194748

[straw]: http://strawlab.org
[mamarama]: http://www.its.caltech.edu/~astraw/research/flydra/

[the Dickinson lab]: http://www.dickinson.caltech.edu/

<div style='clear: both'></div>

### See also ###

<!-- - [Older research on estimation in robotics](vignettes) -->
- [Publications][Publications]
- [Research software](/software) 

[Publications]: /publications