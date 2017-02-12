<!-- ---
title: An ICP variant using a point-to-line metric
Subject_short: PlICP�
PURL: https://purl.org/censi/2007/plicp
Date: 2007-08-22
inMenu: true
orderInfo: -8
description: "PLICP is an ICP variant that uses a point-to-line metric, and a closed-form for minimizing it. The resulting algorithm has some interesting properties: it converges quadratically, and in a finite number of steps. "
-->

[pub_ref_page id='censi08plicp']

* lame [MP4 video accompanying the paper][video-draft] 

**Abstract** -- This paper describes PLICP, an  ICP (Iterative
 Closest/Corresponding Point) variant that uses a
 point-to-line metric, and an exact closed-form for
 minimizing such metric. The resulting algorithm has some
 interesting properties: it converges quadratically, and in
 a finite number of steps. The method is validated against
 vanilla ICP, IDC (Iterative Dual Correspondences), and
 MbICP (Metric-Based ICP) by reproducing the experiments
 performed in Minguez et al. (2006). The experiments suggest
 that PLICP is more precise, and requires less iterations.
 However, it is less robust to very large initial
 displacement errors. The last part of the paper is devoted
 to purely algorithmic optimization of the correspondence
 search; this allows for significant speed-up of the
 computation. The source code is available for download.


![image from paper](https://purl.org/censi/research/2007-plicp/paper_plicp.png)


### Additional material ###

- Source code: 
   - Implemented in C as part of the [Canonical Scan Matcher][csm] package.
   - The core function, which minimizes the point-to-line metric, is also available separately in C, Matlab, and Ruby, [here][gpc].
  
- Dataset used for the experiments (provided by [Javier Minguez][javier]):
   - Original log: [original format](https://purl.org/censi/research/2007-plicp/laserazosSM3.off.gz), [Carmen format](https://purl.org/censi/research/2007-plicp/laserazosSM3.log.gz) 
   - Scan matched with PLICP: [Carmen format](https://purl.org/censi/research/2007-plicp/laserazosSM3-sm.log.gz), [PDF](https://purl.org/censi/research/2007-plicp/laserazosSM3-sm.log.pdf)

- Animations used in the video in PDF format:
  - PLICP: [normal](https://purl.org/censi/research/2007-plicp/sm_plicp_normal.pdf) / [zoom](https://purl.org/censi/research/2007-plicp/sm_plicp_zoom.pdf)
  - vanilla ICP: [normal](https://purl.org/censi/research/2007-plicp/sm_icp_normal.pdf) / [zoom](https://purl.org/censi/research/2007-plicp/sm_icp_zoom.pdf)

<style type='text/css'>
.anim {
  width:200px; border:solid 1px black; margin: 20px;
}
</style>

<img class='anim' src='https://purl.org/censi/research/2007-plicp/sm_plicp_zoom_crop.gif'/>
<img class='anim' src='https://purl.org/censi/research/2007-plicp/sm_icp_zoom_crop.gif'/>


Note that the software for creating these animations is bundled in 
the [CSM][csm] package; the program is called `icp_sm_animate`, see
the documentation therein.


[pdf-draft]: https://purl.org/censi/research/2008-icra-plicp-draft.pdf
[pdf-final]: https://purl.org/censi/research/2008-icra-plicp.pdf
[video-draft]: https://purl.org/censi/research/2008-icra-plicp-video.mp4

[gpc]: https://purl.org/censi/2007/gpc
[csm]: https://purl.org/censi/2007/csm
[javier]: http://webdiis.unizar.es/~jminguez/