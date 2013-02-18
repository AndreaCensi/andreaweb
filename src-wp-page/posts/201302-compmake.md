<!--<div style='float: right; margin: 1em;margin-right:-3em'><img style='width: 16em' src='http://andreacensi.github.com/compmake/static/logo/compmake-logo.png' /></div>

A few years ago, at a [SLAM][slam] summer school in Oxford, 
I attended a talk by [Frank Dellaert][frank] about a scientist's "secret weapons".
I believe he was channeling his advisor [Herb Simon][simon] 
in saying that every scientist must have a secret weapon that give them an
edge against the others. (For the record, Frank's secret weapon is [OCaml][ocaml].)
In this age where most science is highly computational and data-based, the secret weapons are often software tools. [Compmake][compmake] has become one of my secret weapons.-->

[compmake]: http://andreacensi.github.com/compmake/
[simon]: http://en.wikipedia.org/wiki/Herbert_A._Simon
[slam]: http://en.wikipedia.org/wiki/Simultaneous_localization_and_mapping
[frank]: http://www.cc.gatech.edu/~dellaert/
[ocaml]: http://en.wikipedia.org/wiki/OCaml

[compmake]: http://andreacensi.github.com/compmake/

[Compmake][compmake] is a nonobtrusive module that provides Makefile--like facilities to Python programs, including familiar commands 
such as ``make`` and ``clean``, zero-effort parallelization, caching of results (the program can be interrupted and restarted), a console interface, and many other goodies. I have been relying on it daily since a couple of years and
recently I polished it enough that it can be used by others.
 Here's a quick
introduction; [see the webpage][compmake] for the full documentation.

Compmake has been designed primarily for handling long computational-intensive
batch processes that can be decomposed in smaller granular jobs.
To use Compmake, you have to minimally modify your Python program,
such that it can understand the processing layout. 
Basically, each function call of the kind ``y = f(x)`` becomes  ``y = comp(f, x)``, like the following figure shows. 
Compmake takes care of the rest. This simple modification is enough
to solve [most of the frustrating problems that I personally encountered][problems]
in software development.

[problems]: http://andreacensi.github.com/compmake/why.html

![method](http://andreacensi.github.com/compmake/images/initial.png)

[example]: http://andreacensi.github.com/compmake/static/demos/example.py
[example_fail]: http://andreacensi.github.com/compmake/static/demos/example_fail.py

To install Compmake, use ``pip install compmake``. You can try the following examples using [the demo ``example.py``][example].
One way to use Compmake is to use the ``compmake`` executable.
If you write:

    $ compmake example -c make            # runs serially

the module ``example`` will be imported and the jobs defined there 
using ``comp`` will be loaded in the DB. The command ``make`` 
passed with the ``-c`` switch executes the jobs serially.

**Parallel execution**: To run jobs in parallel, use the ``parmake`` command:

    $ compmake example -c "parmake n=6"   # runs at most 6 in parallel

There are all sorts of configuration options for being nice to other users of the machine; for example, Compmake can be instructed not to start other jobs if the CPU or memory usage is already above a certain percentage: 

    $ compmake --max_cpu_load=50 --max_mem_load=50 example -c "clean; parmake"



**Console**: A console is displayed if you just run:
    
    $ compmake example 

Some useful commands are ``ls``, ``make``, ``clean``, and ``parmake``, which 
all do what you think they do.  Write ``help`` for a list of all commands.

**Selective remake**: You can selectively remake part of the computations. For example, suppose that you modify the ``draw()`` function, and you want to
rerun only the last step. You can achieve that by::

    $ compmake example -c "remake draw*"

Compmake will reuse part of the computations (``func1`` and ``func2``)
but it will redo the last step.

**Tolerance to failures**:  If some of the jobs fail (e.g., they throw an exception), compmake will go forward with the rest. To see this behavior, download the file [``example_fail.py``][example_fail], which defines jobs that fail. If you run::

    $ compmake example_fail -c "parmake n=4"

you will see how Compmake completes all jobs that can be completed.

[Give it a go][compmake], and let me know how it goes.
