<!--
title: An accurate closed-form estimate of ICP's covariance 
Subject_short: ICP�covariance
PURL: https://purl.org/censi/2006/icpcov
Date: 2007-01-28
inMenu: true
linkAttrs:
   :link_text: ICP covariance
orderInfo: -2
description: "An algorithm for estimating the covariance of the ICP algorithm, based on the analysis of the error function being minimized."
-->

[pub_ref_page id='censi07accurate']


**Abstract** --  Existing methods for estimating the covariance of the ICP (Iterative Closest/Corresponding Point) algorithm are either inaccurate or are computationally too expensive to be used online. This paper proposes a new method, based on the analysis of the error function being minimized. It considers that the correspondences are not independent (the same measurement being used in more than one correspondence), and explicitly utilizes the covariance matrix of the measurements, which are not assumed to be independent either. The validity of the approach is verified through extensive simulations: it is more accurate than previous methods and its computational load is negligible. The ill-posedness of the surface matching problem is explicitly tackled for under-constrained situations by performing an observability analysis; in the analyzed cases the method still provides a good estimate of the error projected on the observable manifold.

### Additional material ###

- A C implementation of the method is provided as part of [CSM](https://purl.org/censi/2007/csm). The CSM package contains also
a Matlab implementation (which was used for the experiments in the paper), but they are not as documented.


![image from paper](/media/paper-icons/censi07accurate-big.png)

### The joy of reviews `:-)` ###

**Reviewer 1:** The presentation of all relevant symbols in Table I was useful.  
**Reviewer 2:** Table I is never referenced in the text, and does not help to understand the paper.

[pdf-final]: https://censi.science/pub/research/2007-icra-icpcov.pdf
[slides-final]: https://censi.science/pub/research/2007-icra-icpcov-slides.pdf