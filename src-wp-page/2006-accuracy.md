<!-- ---
title: On achievable accuracy for range finder localization
PURL: https://purl.org/censi/2006/accuracy
Date: 2007-01-28
orderInfo: -3
description: "Presents the Cram&eacute;r--Rao lower bound for range-finder sensors"
linkAttrs:
   :link_text: CRB for range sensors
--- -->

[pub_ref_page id='censi07achievable']
<!--
- A. Censi, "*On achievable accuracy for range finder localization*", ICRA'07

   * Final version ([PDF, 352KB][pdf-final])
   * Slides ([PDF, 214KB][slides])
 -->
**Abstract** -- The covariance of every unbiased estimator is bounded by the Cram&eacute;r--Rao lower bound, which is the inverse of Fisher's information matrix. This paper shows that, for the case of localization with range-finders, Fisher's matrix is a function of the expected readings and of the orientation of the environment's surfaces at the sensed points. The matrix also offers a mathematically sound way to characterize under-constrained situations as those for which it is singular: in those cases the kernel describes the direction of maximum uncertainty. This paper also introduces a simple model of unstructured environments for which the Cram&eacute;r--Rao bound is a function of two statistics of the shape of the environment: the average radius and a measure of the irregularity of the surfaces. Although this model is not valid for all environments, it allows for some interesting qualitative considerations. As an experimental validation, this paper reports simulations comparing the bound with the actual performance of the ICP (Iterative Closest/Corresponding Point) algorithm. Finally, it is discussed the difficulty in extending these results to find a lower bound for accuracy in scan matching and SLAM.

<!--
<pre class="bib bib2">
@inproceedings{censi07accuracy,
    author = {Andrea Censi},
    title = {On achievable accuracy
             for range-finder localization},
    booktitle = {Proceedings of the {IEEE} International Conference
               on Robotics and Automation ({ICRA})},
    address = {Rome, Italy},
    year = {2007}, month = April,
    pages = {4170--4175},
    doi = {10.1109/ROBOT.2007.364120},
    issn = {1050-4729},
    url = { https://purl.org/censi/2006/accuracy}
}
</pre> -->


<img src="/media/paper-icons/censi07achievable-big.png"/>


[pdf]: https://purl.org/censi/research/2007-icra-accuracy-draft.pdf
[pdf-final]:  https://purl.org/censi/research/2007-icra-accuracy.pdf
[slides]:  https://purl.org/censi/research/2007-icra-accuracy-slides.pdf
