### Media

- Chapter 11: [Videos for calibration ][video-calib]
- Chapter 12-13: [Videos using the Vehicles simulations (exploration, servoing)][video-sim].
- Chapter 14: [Videos using real data (camera/range-finders on mobile robots)][video-real]

[video-calib]: http://purl.org/censi/2012/camera_calibration#media
[video-real]: http://purl.org/censi/research/2011-bgds/#sensels
[video-sim]: video-vehicles



### Software

All software is available for download from various GitHub projects
(I am working on a one-click installation for Amazon EC2; inquire if interested).

These are the main pieces:

- [boot12env](http://github.com/AndreaCensi/boot12env) is the "root" repository
  that contains scripts for setting up a virtual environment and 
  checking out the other packages.
- [BootOlympics](http://github.com/AndreaCensi/boot_olympics) 
  is the package responsible for interfacing agents and robots, 
  loading/saving data and running the benchmarks,
  such as prediction, servoing, etc.
  - [bvapps](http://github.com/AndreaCensi/bvapps)  contains the configuration
    files for the simulations/experiments.
  - [boot_agents](http://github.com/AndreaCensi/boot_agents)  contains the 
    implementation of the agents (BDS, BGDS, DDS, etc.).
- [PyVehicles](http://github.com/AndreaCensi/vehicles) is used
  to run the Vehicles simulations.
- [PyGeometry](http://github.com/AndreaCensi/geometry) implements
  all differential geometry functions.


These are miscellaneous utilities for creating reports, videos, and general plumbing:

- [procgraph](http://github.com/AndreaCensi/procgraph), for creating the videos.
- [reprep](http://github.com/AndreaCensi/reprep), for creating the reports.
- [latex_gen](http://github.com/AndreaCensi/latex_gen), for auto-generating the LaTeX reports (see Chapter 13).
- [pysnip](https://github.com/AndreaCensi/pysnip) for running Python from inside LaTeX.
- [compmake](http://github.com/AndreaCensi/compmake), for parallel computation.
- [conf_tools](http://github.com/AndreaCensi/conf_tools), for reading yaml 
  configuration.
- [PyContracts](http://github.com/AndreaCensi/contracts)