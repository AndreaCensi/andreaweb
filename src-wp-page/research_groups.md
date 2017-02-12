
<img src="http://andrea.caltech.edu/wp-content/uploads/2012/08/fGH-300x226.png" alt="" title="fGH" style="width: 14em" class="alignright size-medium wp-image-822" />

Many nonlinear models can be written in the form
$$
        y = h \cdot f(g \cdot x),
$$
where $f:X\rightarrow Y$ is a nonlinear function, $h$ and $g$ are elements sampled from two [groups][groups] $G$ and $H$, and "$\cdot$" represents a [group action][action].

This structure appears in many problems:

- In *sensing* problems, $x$ is the hidden state, $f$ groups together all the  nonlinearities of the image formation problem, $H$ are *nuisances* acting on the observations, and $G$ can represent either *control opportunities* or nuisances acting on the state. 

- In learning problems such as *[bootstrapping][page:bootstrapping]*, $x$ and $y$ are dynamical systems, the group actions are invertible "representation nuisances", and $f$ groups together noise and other noninvertible nuisances.


#### Questions that we investigate

Once you have this group structure, there are several research
questions that can be approached in the general case.

- [**Modeling** sensing operations](#research_groups_modeling)
- [**Features** operators](#research_groups_features)
- [**Group spectral dossiers**](#research_groups_dossiers)

#### Recent work

[pub_ref id='censi12phd1' note='See Chapter XXX']

#### Funding

We gratefully acknowledge funding from [DARPA Defense Sciences Office][dso], 
as part of the *MSEE* program.


[external_page page='research_groups_modeling']

[external_page page='research_groups_features']

[external_page page='research_groups_dossiers']



[action]: http://en.wikipedia.org/wiki/Group_action
[groups]: http://en.wikipedia.org/wiki/Group_(mathematics)
[phd1]: https://purl.org/censi/boot/v1/

