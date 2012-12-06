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

<style type='text/css'>
div.high {
    display: block;
    
    margin: 0.5em;
    float: left;
    text-align: center;
    padding: 1em;
    
    height: 10em;
}
div.high:hover { 
    border: solid 0.5em #ecc; 
    padding: 0.5em;
}
div.high img { width: 7em;}
div.high P {
    font-weight: bold;
}
div.container { display: block;
overflow: auto;
padding-bottom: 2em;}
</style>

<div class='container'>
    <a href="/research/bootstrapping">
    <div class='high'>
        <p>
        Bootstrapping
        </p>
        <img src='/media/paper-icons/bv_icon.png'></a>
    </div>
</a>

<a href="/research/biology">
    <div class='high'>
        <p>
        Biology
        </p>
        <img src='/media/paper-icons/censi12saccade_preprint.png'>
    </div>
</a>

<a href="/research/robot-perception">
    <div class='high'>
        <p>
        Robot perception
        </p>
        <img src='/media/paper-icons/ftf.jpg'>
    </div>
</a>

<a href="/research/estimation">
    <div class='high'>
        <p>
        Other<br/>estimation<br/>problems
        </p>
        <img src='/media/paper-icons/fractals.jpg'>
    </div>
</a>

</div>

See also: [List of publications][Publications];  [Research software](/software).

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

**Formal** [is better than][Dijkstra] informal.
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


<!-- Keep  reading for some highlights from my research, or read my [publications] list.-->


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


<!-- - [Older research on estimation in robotics](vignettes) -->


[Publications]: /publications