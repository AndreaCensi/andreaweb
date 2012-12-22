[PyContracts][github] is a Python package that allows to declare constraints on function parameters and return values. It supports a basic type system, variables binding, arithmetic constraints, and has several specialized contracts (notably for Numpy arrays).

See [documentation and installation instructions on GitHub.][github]

[github]: http://andreacensi.github.com/contracts/

### Examples

It's very useful to check Numpy array dimensions:

<pre class=prettyprint>
from contracts import contract

@contract(a='array[MxN],M>0,N>0', b='array[NxP],P>0', returns='array[MxP]')
def matrix_multiply(a,  b):
    ''' Multiplies two matrices together with compatible dimensions. '''
    ...
</pre>

You can also define new contracts:

<pre class=prettyprint>
from contracts import new_contract

new_contract('rgb', 'array[HxWx3](uint8),H>10,W>10')
</pre>

A slightly more complicated example:

<pre class=prettyprint>
from contracts import contract
@contract(       a='list[ M ](type(x))',
                 b='list[ N ](type(x))',
           returns='list[M+N](type(x))')
def my_cat_equal(a, b):
    ''' Concatenate two lists together, requiring they contain
        elements of the same type. '''
    ...
</pre>

An example using Python 3 annotations:

<pre class=prettyprint>
from contracts import contract

@contract
def my_function(a : 'int,>0', b : 'list[N],N>0') -> 'list[N]':
     """ Requires b to be a nonempty list, and the return
         value to have the same length. """
     ...
</pre>


