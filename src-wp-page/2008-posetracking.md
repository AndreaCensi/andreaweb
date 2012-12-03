<!-- ---
title: On achievable accuracy for pose tracking
PURL: http://purl.org/censi/2008/posetracking
-> http://purl.org/ccensi/web/crb-pose-tracking/ 
Date: 2008-09-15
orderInfo: -300
description: ""
linkAttrs:
   :link_text: CRB for pose tracking
---
 -->

[pub_ref_page id='censi09posetracking']

* Source code: used the repository version of [CSM](http://purl.org/censi/2007/csm).  

**Abstract** --- This paper presents Cramer-Rao bound-like inequalities for
pose tracking, which is defined as the problem of
recovering the robot displacement given two successive
readings of a relative sensor. Computing the exact Fisher
Information Matrix (FIM) for pose tracking is hard, because
the state comprises the map, which is infinite-dimensional
and unknown. This paper shows that the FIM for pose
tracking can be bounded by a function of the FIM for
localization on a known map, thereby reducing the analysis
to a finite-dimensional problem. The resulting bounds are
independent of the map prior and representation. The
results are valid for any relative sensor; the experimental
verification is done for the particular case of pose
tracking using range-finders (scan matching).


<!-- [pdf]: http://purl.org/censi/research/2009-icra-posetracking.pdf -->