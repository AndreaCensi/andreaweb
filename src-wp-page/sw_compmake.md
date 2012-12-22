
[Compmake][site] is a non-obtrusive module that provides:

* ``make``--like facilities to your Python computations (``make``, ``clean``, etc.),
  including caching of temporary results (that is, you can interrupt your program, and restart it without losing  (much) data.)
* A console for inspecting failures and partial completion.
* Single-host (using the ``multiprocessing`` module) and multiple-host parallelization (using ssh-spawned slaves).
* Peace of mind!

To use Compmake, you have to minimally modify your Python program,
such that it can understand the processing layout and
the opportunities for parallelization.

[site]: http://compmake.org

<img class=bigpicture src='http://compmake.org/images/initial.png'/>

You would run the modified program using:

    $ compmake example -c make       # runs locally
    $ compmake example -c parmake    # runs locally in parallel
    $ compmake example -c clustmake  # runs on a cluster

You can selectively remake part of the computations. For example,
suppose that you modify the ``draw()`` function, and you want to
rerun only the last step. You can achieve that by:

    $ compmake example -c "remake draw*"

[Compmake][site] will reuse part of the computations (``func1`` and ``func2``)
but it will redo the last step.

Moreover, by running ``compmake example`` only, you have access to a
console that allows you to inspect the status of the computations,
cleaning/remaking jobs, etc.

[Compmake][site] has been designed primarily for handling long computational-intensive
batch processes. It assumes that the computational layout is fixed and that 
all intermediate results can be cached to disk. If these two conditions are met,
you can use [Compmake][site] to gain considerable peace of mind.

Still not convinced? Read [why you should use Compmake][why].

[why]: http://andreacensi.github.com/compmake/why.html#why
