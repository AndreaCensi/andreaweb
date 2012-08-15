
<img src="http://andrea.caltech.edu/wp-content/uploads/2012/08/fGH-300x226.png" alt="" title="fGH" style="width: 14em" class="alignright size-medium wp-image-822" />

Many nonlinear models can be written in the form
$$
        y = h \cdot f(g \cdot x),
$$
where $f:X\rightarrow Y$ is a nonlinear function, $h$ and $g$ are group elements sampled from two groups $G$ and $H$, and "$\cdot$" represents a [group action][action].

This structure appears in many problems:

- For example, in a sensing problem, $x$ is the hidden state, $f$ groups together all the   nonlinearities of the image formation problem, $H$ are *nuisances* acting on the observations, and $G$ can represent either a control opportunities or a nuisance acting on the state. **cite poggio**

- In learning problems such as [bootstrapping][boot], $x$ and $y$ are dynamical systems, the group actions are invertible "representation nuisances", and $f$ groups together noise and other noninvertible nuisances.


#### Questions that we investigate

- ... 
- **Canonization** operators

#### Recent work

- Part III of [my dissertation][phd1]

#### Funding

We gratefully acknowledge [DARPA DSO][dso]'s funding, as part of the MSEE program.


[external_page page='research_groups_modeling']

[external_page page='research_groups_dossiers']

[external_page page='research_groups_features']




[action]: http://en.wikipedia.org/wiki/Group_action
[phd1]: http://purl.org/censi/boot/v1/