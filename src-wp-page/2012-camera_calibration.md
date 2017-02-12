[pub_ref_page id='censi12cameracalib']

> **Abstract**: This paper presents a new intrinsic calibration method that allows us to calibrate a generic single-view point camera just by waving it around. From the video sequence obtained while the camera undergoes random motion, we compute the pairwise time correlation of the luminance signal for a subset of the pixels. We show that, if the camera undergoes a random uniform motion, then the pairwise correlation of any pixels pair is a function of the distance between the pixel directions on the visual sphere. This leads to formalizing calibration as a problem of metric embedding from non-metric measurements: we want to find the disposition of pixels on the visual sphere, from similarities that are an unknown function of the distances. This problem is a generalization of multidimensional scaling (MDS) that has so far resisted a comprehensive observability analysis (can we reconstruct a metrically accurate embedding?) and a solid generic solution (how to do so?). We show that the observability depends both on the local geometric properties (curvature) as well as on the global topological properties (connectedness) of the target manifold. It follows that, in contrast to the Euclidean case, on the sphere we can recover the scale of the points distribution, therefore obtaining a metrically accurate solution from non-metric measurements. We describe an algorithm that is robust across manifolds and can recover a metrically accurate solution when the metric information is observable. We demonstrate the performance of the algorithm for several cameras (pin-hole, fish-eye, omnidirectional), and we obtain results comparable to calibration using classical methods. Additional synthetic benchmarks show that the algorithm performs as theoretically predicted for all corner cases of the observability analysis.



## Supplemental Materials

- [Appendix B: Complete statistics/visualizations][tables]

- Results as 3D Matlab figures (``.fig``):

  - [Flip Mino camera][mino_fig] - small field of view (45deg)
  - [GOPRO camera][gopro_fig] - large field of view (150deg)
  - [omnidirectional camera][omni_fig] (360deg)

- [Complete .MP4 logs (~8GB)][logs]
- [Python source code (.tgz)][source]; manual coming soon.

[tables]: https://purl.org/censi/research/2012-camera_calibration/2012-camera_calibration-tables.pdf
[source]: https://purl.org/censi/research/2012-camera_calibration/20120101-calib_env-snapshot.tgz
[logs]: https://purl.org/censi/research/2012-camera_calibration/logs/
[mino_fig]: https://purl.org/censi/research/2012-camera_calibration/mino.fig
[gopro_fig]: https://purl.org/censi/research/2012-camera_calibration/GOPRb.fig
[omni_fig]: https://purl.org/censi/research/2012-camera_calibration/omni.fig

<a name='media'></a>
## Example input data

Our method calibrates a camera just by considering the inter-pixel correlations
when the camera undergoes random motion.
These movies are some examples of the input data that we use for calibration
in the paper (download the complete logs [here][logs]).
From these videos, and nothing else, we can reconstruct the sensor geometry
for generic optics.

<style type='text/css'>
table tr#head td { font-weight: bold; text-align: center;}
table tr#where td { font-style: italic; text-align: center;}
table td.what {
    vertical-align: middle;
    font-style: italic !important;
    font-weight: normal !important;
    text-align: right !important;
}
tr.distribution td img {
  width: 100%;
}
</style>
<div style='text-align: center'>
<table>
<tr id='head'>
<td class="what">camera</td>
<td>
    <p>Flip Mino</p>
    <img src='https://purl.org/censi/research/2012-camera_calibration/images/flip_small.jpg'/>
</td>
<td>
    <p>GOPRO</p>
    <img src='https://purl.org/censi/research/2012-camera_calibration/images/gopro_small.jpg'/>
</td>
<td>
    <p>Omnidirectional camera</p>
    <img src='https://purl.org/censi/research/2012-camera_calibration/images/omni_small.jpg'/>
</td>
</tr>
<tr>
  <td class="what">example log</td>
  <td>
  <object width="250" height="180"><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="https://vimeo.com/moogaloop.swf?clip_id=33842986&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=00adef&amp;fullscreen=1&amp;autoplay=0&amp;loop=1" /><embed src="https://vimeo.com/moogaloop.swf?clip_id=33842986&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=00adef&amp;fullscreen=1&amp;autoplay=0&amp;loop=1" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="250" height="180"></embed></object>
  </td>
  <td>
  <object width="250" height="180"><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="https://vimeo.com/moogaloop.swf?clip_id=33842992&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=00adef&amp;fullscreen=1&amp;autoplay=0&amp;loop=1" /><embed src="https://vimeo.com/moogaloop.swf?clip_id=33842992&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=00adef&amp;fullscreen=1&amp;autoplay=0&amp;loop=1" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="250" height="180"></embed></object>
  </td>
  <td>
  <object width="250" height="180"><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="https://vimeo.com/moogaloop.swf?clip_id=33843143&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=00adef&amp;fullscreen=1&amp;autoplay=0&amp;loop=1" /><embed src="https://vimeo.com/moogaloop.swf?clip_id=33843143&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=00adef&amp;fullscreen=1&amp;autoplay=0&amp;loop=1" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="250" height="180"></embed></object>
  </td>
</tr>
<tr id='where'>
  <td class="what">place</td>
  <td>Andrea walking in the Caltech campus</td>
  <td>Davide walking in the <a href="http://www.youtube.com/watch?v=4z2DtNW79sQ">streets of Philadelphia</a></td>
  <td>Davide indoor shaking it like a polaroid picture</td>
</tr>
<tr id='solution' class='distribution'>
    <td class="what">solution</td>
    <td>
       <a href="https://purl.org/censi/research/2012-camera_calibration/stats/images/mino-grid24-corr-m-CBC3dw-final-solution-S-aligned.pdf">
      <img src="https://purl.org/censi/research/2012-camera_calibration/stats/images/mino-grid24-corr-m-CBC3dw-final-solution-S-aligned-png.png"/>
      </a>
    </td>
    <td>
       <a href="https://purl.org/censi/research/2012-camera_calibration/stats/images/GOPRb-grid24-corr-m-CBC3dw-final-solution-S-aligned.pdf">
      <img src="https://purl.org/censi/research/2012-camera_calibration/stats/images/GOPRb-grid24-corr-m-CBC3dw-final-solution-S-aligned-png.png"/>
      </a>
    </td>
    <td>
      <a href="https://purl.org/censi/research/2012-camera_calibration/stats/images/omni-grid8-corr-m-CBC3dw-final-solution-S-aligned.pdf">
      <img src="https://purl.org/censi/research/2012-camera_calibration/stats/images/omni-grid8-corr-m-CBC3dw-final-solution-S-aligned-png.png"/>
    </a>
    </td>
</tr>
<tr id='groundtruth' class='distribution'>
    <td class="what">ground truth</td>
    <td>
      <a href="https://purl.org/censi/research/2012-camera_calibration/stats/images/mino-grid24-corr-m-CBC3dw-final-solution-true-S.pdf">
      <img src="https://purl.org/censi/research/2012-camera_calibration/stats/images/mino-grid24-corr-m-CBC3dw-final-solution-true-S-png.png"/>
    </a>
    </td>
    <td>
      <a href="https://purl.org/censi/research/2012-camera_calibration/stats/images/GOPRb-grid24-corr-m-CBC3dw-final-solution-true-S.pdf">
      <img src="https://purl.org/censi/research/2012-camera_calibration/stats/images/GOPRb-grid24-corr-m-CBC3dw-final-solution-true-S-png.png"/>
      </a>
    </td>
    <td>
      <a href="https://purl.org/censi/research/2012-camera_calibration/stats/images/omni-grid8-corr-m-CBC3dw-final-solution-true-S.pdf">
      <img src="https://purl.org/censi/research/2012-camera_calibration/stats/images/omni-grid8-corr-m-CBC3dw-final-solution-true-S-png.png"/>
    </a>
    </td>
</table>
</div>
