[pub_ref_page id='censi12cameracalib_preprint']

> **Abstract**: This paper presents a new intrinsic calibration method that allows us to calibrate a generic single-view point camera just by waving it around. From the video sequence obtained while the camera undergoes random motion, we compute the pairwise time correlation of the luminance signal for a subset of the pixels. We show that, if the camera undergoes a random uniform motion, then the pairwise correlation of any pixels pair is a function of the distance between the pixel directions on the visual sphere. This leads to formalizing calibration as a problem of metric embedding from non-metric measurements: we want to find the disposition of pixels on the visual sphere, from similarities that are an unknown function of the distances. This problem is a generalization of multidimensional scaling (MDS) that has so far resisted a comprehensive observability analysis (can we reconstruct a metrically accurate embedding?) and a solid generic solution (how to do so?). We show that the observability depends both on the local geometric properties (curvature) as well as on the global topological properties (connectedness) of the target manifold. It follows that, in contrast to the Euclidean case, on the sphere we can recover the scale of the points distribution, therefore obtaining a metrically accurate solution from non-metric measurements. We describe an algorithm that is robust across manifolds and can recover a metrically accurate solution when the metric information is observable. We demonstrate the performance of the algorithm for several cameras (pin-hole, fish-eye, omnidirectional), and we obtain results comparable to calibration using classical methods. Additional synthetic benchmarks show that the algorithm performs as theoretically predicted for all corner cases of the observability analysis.



## Supplemental Materials

- [Appendix B: Complete statistics/visualizations][tables]

- Results as 3D Matlab figures (``.fig``):

  - [Flip Mino camera][mino_fig] - small field of view (45deg)
  - [GOPRO camera][gopro_fig] - large field of view (150deg)
  - [omnidirectional camera][omni_fig] (360deg)

- [Complete .MP4 logs (~8GB)][logs]
- [Python source code (.tgz)][source]; manual coming soon.

[tables]: http://purl.org/censi/research/2012-camera_calibration/2012-camera_calibration-tables.pdf
[source]: http://purl.org/censi/research/2012-camera_calibration/20120101-calib_env-snapshot.tgz
[logs]: http://purl.org/censi/research/2012-camera_calibration/logs/
[mino_fig]: http://purl.org/censi/research/2012-camera_calibration/mino.fig
[gopro_fig]: http://purl.org/censi/research/2012-camera_calibration/GOPRb.fig
[omni_fig]: http://purl.org/censi/research/2012-camera_calibration/omni.fig

<a name='media'></a>
## Example input data 

Our method calibrates a camera just by considering the inter-pixel correlations
when the camera undergoes random motion.
These movies are some examples of the input data that we use for calibration
in the paper (download the complete logs [here][logs]).
From these videos, and nothing else, we can reconstruct the sensor geometry
for generic optics.

<div style='text-align: center'>
<table>
<tr id='head'>
<td>Flip Mino</td>
<td>GOPRO</td>
<td>Omnidirectional camera</td>
</tr>
<tr id='where'>
<td>Caltech campus</td>
<td>Streets of Philadelphia</td>
<td>indoor</td>
</tr>
<tr>
<td>
<object width="350" height="250"><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id=33842986&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=1&amp;color=00adef&amp;fullscreen=1&amp;autoplay=0&amp;loop=0" /><embed src="http://vimeo.com/moogaloop.swf?clip_id=33842986&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=1&amp;color=00adef&amp;fullscreen=1&amp;autoplay=0&amp;loop=0" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="350" height="250"></embed></object>
</td>
<td>
<object width="350" height="250"><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id=33842992&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=1&amp;color=00adef&amp;fullscreen=1&amp;autoplay=0&amp;loop=0" /><embed src="http://vimeo.com/moogaloop.swf?clip_id=33842992&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=1&amp;color=00adef&amp;fullscreen=1&amp;autoplay=0&amp;loop=0" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="350" height="250"></embed></object>
</td>
<td>
<object width="350" height="250"><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id=33843143&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=1&amp;color=00adef&amp;fullscreen=1&amp;autoplay=0&amp;loop=0" /><embed src="http://vimeo.com/moogaloop.swf?clip_id=33843143&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=1&amp;color=00adef&amp;fullscreen=1&amp;autoplay=0&amp;loop=0" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="350" height="250"></embed></object>
</td>
</tr>
</table>
</div>