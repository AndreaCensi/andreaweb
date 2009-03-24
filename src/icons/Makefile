#size=64x64
size=80x80

icons = calibration.jpg \
  ppu.jpg \
  accuracy.jpg \
  icpcov.jpg \
  plicp.jpg \
  gpm.jpg \
  hsm.jpg \
  ftf.jpg \
  ghtv.jpg \
  fractals.jpg \
  posetracking.jpg \
  hsm3d.jpg \
  consensus.jpg \
  bio-attitude.jpg  


all:   $(icons)

clean:
	-rm -f $(icons)

%.jpg: src/%.png
	convert $< -resize $(size) -quality 100  $@

%.jpg: src/%.jpg
	convert $< -resize $(size) -quality 100  $@

