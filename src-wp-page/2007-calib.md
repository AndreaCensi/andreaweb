<!-- ---
title: Simultaneous maximum-likelihood calibration of robot and sensor parameters
linkAttrs:
   :link_text: Calibration
PURL: https://purl.org/censi/2007/calib
Date: 2007-08-22
inMenu: true
orderInfo: -60
description: "A method for simultaneous maximum-likelihood calibration of robot and sensor parameters."
--- -->

Conference paper:

[pub_ref_page id='censi08calib']

Journal paper:

[pub_ref_page id='censi13joint']


**Abstract** --  Consider a differential-drive mobile robot equipped with an on-board exteroceptive sensor that can estimate its own motion, e.g., a range-finder. Calibration of this robot involves estimating six parameters: three for the odometry (radii and distance between the wheels), and three for the pose of the sensor with respect to the robot. After analyzing the observability of this problem, this paper describes a method for calibrating all parameters at the same time, without the need for external sensors or devices, using only the measurement of the wheels velocities and the data from the exteroceptive sensor. Moreover, the method does not require the robot to move along particular trajectories. Simultaneous calibration is formulated as a maximum-likelihood problem and the solution is found in a closed form. Experimental results show that the accuracy of the proposed calibration method is very close to the attainable limit.

### Additional materials ###

The software and sensor logs is available for download:

- [Source code and log files][source]
- Video attached to the conference paper[^1]: [MPG][video-mpg], [DivX][video-divx].

[source]: https://github.com/AndreaCensi/calibration


![A team of 5 Khepera robots with an hokuyo](/media/mini/paper_calib.jpg)



<!--
- [README first][readme]
- [Matlab Source code][matlab] ([zip][matlab_zip])
- [Sensor logs][logs] ([77MB zip][logs_zip]) -->

[Oriolo]: http://www.dis.uniroma1.it/~labrob/people/oriolo/oriolo.html

[08icra-calib-draft]: https://purl.org/censi/research/2008-icra-calibration-draft.pdf
[08icra-calib-final]: https://purl.org/censi/research/2008-icra-calibration.pdf
[video-mpg]: https://purl.org/censi/research/2008-icra-calibration-video.mpg
[video-divx]: https://purl.org/censi/research/2008-icra-calibration-video.divx

[readme]: https://purl.org/censi/research/2008-icra-calibration/
[logs]: https://purl.org/censi/research/2008-icra-calibration/logs/
[logs_zip]: https://purl.org/censi/research/2008-icra-calibration/logs.zip
[matlab]: https://purl.org/censi/research/2008-icra-calibration/matlab/
[matlab_zip]: https://purl.org/censi/research/2008-icra-calibration/matlab.zip

<!-- [^1]: Unfortunately the MPEG video does not work in QuickTime; while other players, such as VLC, MPlayer, Windows Media Player, should be OK. -->