from file_utils import *
import sys

def main(args):
    directory = args[0]
    output = args[1]
    base_dir = '/mnt/1211-bv1bds1'
    base_url = 'https://purl.org/censi/research/2012-bv1bds1'
    base_splash = '/mnt/1211-bv1bds1/videos/splash'

    records = load_records(directory, base_dir=base_dir, base_url=base_url, base_splash=base_splash)
    for i, r in enumerate(records):
        r['id'] = 'video%d' % i
        r['flowplayer_sfw'] = 'http://andrea.caltech.edu/pub/research/2011-bgds/flowplayer-3.2.4.swf'
        r['ratio'] = 1.0 / (r['ID_VIDEO_WIDTH'] * 1.0 / r['ID_VIDEO_HEIGHT'])
        print(r['video'], r['episode'])
    records.sort(key=lambda x:x['robot'])


    records_expl = [r for r in records if r['episode'] == 'ep_expl_expswitch_t1_00000' and r['video'] == 'exz1sb']
    write_all(records_expl, 'list_exploration.md')

    records_servo = [r for r in records if r['episode'] == 'ep_serv_bdse3_00000']
    write_all(records_servo, 'list_servo.md')

    records_servonav = [r for r in records if r['episode'] == 'ep_servonav_bdse3_00000' and r['video'] == 'mp4f2sr']
    write_all(records_servonav, 'list_servonav.md')

    write_all(records[:10], output)

def write_all(records, output):
    print('Writing %d videos to %r' % (len(records), output))
    f = open(output, 'w')
    for r in records:
        write_one(r, f)

from string import Template
def write_one(r, f):
    s2 = """
<style type='text/css'>
    #$id {
        width: ${ID_VIDEO_WIDTH}px;
        height: ${ID_VIDEO_HEIGHT}px;
        background: #000 url('$url_splash') 0 0 no-repeat;
        background-size: 100%;
        -webkit-transition: background 1s;
        -moz-transition: background 1s;
    }
    #$id.is-poster {
       background-size: 100%;
    }
</style>

<h3>Robot $robot, agent $agent, episode $episode</h3>
<div id='$id' data-ratio='$ratio' class="flowplayer is-splash color-light">
    <video preload="none" src="$url">
    </video>
</div>
<a class="download" href="$url"> download (mp4, $video_size_mb MB) </a>
"""

    keys = dict(**r)
    f.write(Template(s2).substitute(keys))

def load_records(directory, base_dir, base_url, base_splash):
    files = locate_files(directory, '*.mp4')
    records = [record_from_file(f,  base_dir, base_url, base_splash) for f in files]
    return records

def make_splash(filename, splash):
    import subprocess
    cmd = ['ffmpeg', #'-ss','8',
     '-i', filename,
        '-y', '-f', 'image2', '-sameq', '-vframes', '1', splash]
    process = subprocess.Popen(args=cmd,stdin=subprocess.PIPE)
    process.wait()
    assert os.path.exists(splash)

@disk_cache
def video_info(mp4):
    import subprocess
    # first we identify the video resolution
    args = ('mplayer -identify -vo null -ao null -frames 0'.split() + [mp4])
    output = subprocess.check_output(args)

    info = {}
    for line in output.split('\n'):
        if line.startswith('ID_'):
            key, value = line.split('=', 1)
            try: # interpret numbers if possible
                value = eval(value)
            except:
                pass
            info[key] = value

    print info
    #self.debug("Video configuration: %s" % info)

    # keys = ["ID_VIDEO_WIDTH", "ID_VIDEO_HEIGHT",
    #         "ID_VIDEO_FPS", "ID_LENGTH"]
    return info

def record_from_file(filename, base_dir, base_url, base_splash):
    res = {}
    res['filename'] = filename
    res['video_size'] = os.stat(filename).st_size
    res['video_size_mb'] = '%.1f' % (res['video_size'] / 1000000.0)
    res['basename'] = os.path.splitext(os.path.basename(filename))[0]
    res['id'] = res['basename']
    res['base_dir'] = base_dir
    res['base_url'] = base_url
    res.update(video_info(filename))
    def make_url(x):
        xr = os.path.relpath(x, base_dir)
        return base_url + '/' + xr

    res['url'] = make_url(filename)

    if not os.path.exists(base_splash):
        os.makedirs(base_splash)

    res['splash'] = os.path.join(base_splash, res['id'] + '.png')
    res['url_splash'] = make_url(res['splash'])

    if not os.path.exists(res['splash']):
        make_splash(filename, res['splash'])

    tokens = res['basename'].split('-')
    if len(tokens) != 4:
        print('Strange one: %s' % res)
        return None

    res['robot'] = tokens[0]
    res['agent'] = tokens[1]
    res['episode'] = tokens[2]
    res['video'] = tokens[3]
    return res

if __name__ == '__main__':
    main(sys.argv[1:])


    #     s = """
# <div class='video-record'>
#     <h3>Robot $robot, agent $agent, episode $episode</h3>
#     <div class="flowplayer is-splash" >
#        <video preload="none"  src="$url"><img src="$url_splash" /></video>
#     </div>
#     <a class="download" href="$url"> download (mp4, $video_size_mb MB) </a>
# </div>
# """

#     s2 = """
# <div class='video-record'>
#     <h3>Robot $robot, agent $agent, episode $episode</h3>
#     <div class="widget_container">

#         <a class='play' href="#$id"
#           onclick='alert("cia2o"); flowplayer("${id}widget", "$flowplayer_sfw", {clip: { scaling: "fit", url:"$url"} });'> 
#           play 
#         </a>  

#         <a class="download" href="$url"> download (mp4, $video_size_mb MB) </a>

#         <a  
#              href="#$id"
#              onclick='alert("ciao");flowplayer("#${id}widget", "$flowplayer_sfw", {clip: { scaling: "fit", url:"$url"} });'
#             id = "${id}widget" >  
#             qui
#             <!--<img src='$url_splash' style="width: $ID_VIDEO_WIDTH; height: $ID_VIDEO_HEIGHT;"/>-->
#         </a>

#         <script type='text/javascript'>

#         api = $$('#${id}widget').data('flowplayer');
#         alert(api);
#         </script>

        
#     </div>

# </div>
# """
#     s2 = """
# <div class='video-record'>
#     <h3>Robot $robot, agent $agent, episode $episode</h3>
#     <a class="download" href="$url"> download (mp4, $video_size_mb MB) </a>

#     <div class="widget_container">

#     <!-- style="display: block; background-image: url('$url_splash'); width: $ID_VIDEO_WIDTH !important; height: $ID_VIDEO_HEIGHT !important;" -->
#     <div class="player" id ="${id}widgetbig">
#         <video preload='none' src='$url' >
         
#         </video>        
#         <img src='$url_splash' style="width: $ID_VIDEO_WIDTH; height: $ID_VIDEO_HEIGHT;" id = "${id}widget" />
#     </div>


#     <script type='text/javascript'>
#         $$("#${id}widget").click(function() {
#             $$("#${id}widget").hide();
#             $$("#${id}widgetbig").flowplayer({
#                  ratio: $ratio, 
#                  autoPlay: true,
#                  splash: true,
#                  fullscreen: true
#             });
#         });
#     </script>

#     </div>
# </div>
# """