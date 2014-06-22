<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>

<aside class='widget widget_pages' id='aside-front'>
    <ul>
<?php wp_list_pages(array('title_li' => '', 'depth'=>2)); ?>  
    </ul>
</aside>

<div id="content" class="narrowcolumn" role="main">
    
    <?php include('/home/andrea/scm/andreaweb/src-wp-page/index-intro.html'); ?>

    <div id="travel">
        <h3>Travel plans</h3>
        <?php include('/home/andrea/scm/andreaweb/src-wp-page/index-plans.html'); ?>
    </div>

    <div id='important'>
        <h3>Note</h3>
        <ul><li>There is<a href="http://censi.mit.edu/media/NSF-NRI-funding.pdf">
             funding available for MIT PhD/MS students
            who want to work with me.
        </a></li></ul>
    </div>

    <div id="video_gallery">
        <h3>Video gallery</h3>
        <?php include('/home/andrea/scm/andreaweb/src-wp-page/index-videos.html'); ?>
    </div>


    <div id='short_news_and_travel_'>
        <h3>What's new</h3>
        <div id='fluid_short_news'>
            <!-- <h3 id='short_news_title'> What's new </h3> -->
            <?php
                function filter_where($where = '') {
                    $where .= " AND post_date >= '" . date('Y-m-d', strtotime('-360 days')) . "'";
                    return $where;
                }
                add_filter('posts_where', 'filter_where');

                $q = 'cat=12';
                $q = $q . '&orderby=date&order=desc&posts_per_page=100';
                query_posts($q);

                $counter = 0;
                while (have_posts()) : the_post();?>
                    <div class='shortpost' id='shortpost<?php print($counter++); ?>'>
                        <h4>
                            <span class='date'><?php the_time('Y-m-d') ?> </span>
                             <a href="<?php the_permalink() ?>" rel="bookmark" class='title'>
                                <?php the_title(); ?>
                             </a>
                        </h4>
                        <div class="entry"><?php the_content(); ?></div>
                    </div>
            <? endwhile; ?>
            <?php remove_filter('posts_where', 'filter_where'); ?>
        <!--    <ul style='margin-top: 2em'>
            <li> <a href="http://purl.org/censi/research/201303-bootstrapping-vehicles.pdf">
                Recent presentation on my work</a>; <a href="http://purl.org/censi/2012/phd">dissertation</a>.
        </li> 
        <li>

         <a href="http://vimeo.com/andreacensi/icra2013-diffeo-planning">Here's the video</a> for the paper I presented at ICRA 2013: (<a href="http://purl.org/censi/research/2012-dptr1.pdf">PDF</a>).
            </li>
            </ul>
            <iframe src="http://player.vimeo.com/video/65564176" width="95%"   frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
-->
            <div class='shortpost'>
            <a class='older' id='older-news' href='/misc/old-news'>Older news... </a>
            </div>
        </div>
        
    </div>


    <div id='research_items'> 

    	<h3 id='what_new'> Longer news
            <span id="rsslink">(<a rel="external nofollow" id="feedrss" 
                title="Get website updates as RSS" href="http://purl.org/censi/feed"><img src='media/rss.gif' alt='RSS'/> RSS feed</a>)</span>
        </h3>

            <?php
                query_posts('cat=-12'.'&orderby=date&order=desc'.'&posts_per_page=10');
                $i = 0 ;
                while (have_posts()) : the_post(); $i++; 
                    $link = 'blog/page/'.$i.'/';
                ?>
                    <div class='post'>
                        <h4> <span class='date'><?php the_time('Y-m-d') ?> </span>
                            <a href="<?php the_permalink() ?>" rel="bookmark">
                                <?php the_title(); ?>
                            </a>
                        </h4>
                        <?php if ($i <= 8): ?> 
                        <div class="entry"><?php the_excerpt(); ?></div>
                        <?php endif; ?>
                    </div>
            <? endwhile; ?>
            <a class='older' id='older-posts' href='/blog/page/10/'>Older posts... </a>
    </div>


<!-- 

<div id='widget-gplus'>
    <h3>Google+ </h3>
    <a href="https://plus.google.com/106839984596770449716">
        <img class='site-icon' src='/media/googleplus.png'/>    
        my Google+ profile</a><br/>
    <div id="gpluswidget" data-id="106839984596770449716" data-key="AIzaSyAmCrdKWfCqbw5eRHwXftqetgnIliTwIcc" 
    data-posts="10" data-lang="yes" data-width="300" data-bkg="transparent" data-padding="10" data-border="f5f5f5" 
    data-radius="0" data-txt="0c0c0c" data-link="36c" data-favicon="yes" data-header="no" data-footer="yes" data-page="no"></div>
    <script type="text/javascript" src="http://gplusapi.googlecode.com/files/widget0.js"></script>
    </div>
</div> -->


<style type='text/css'>
#fluid_short_news { height: 35em; width: 85em;}
#fluid_short_news { clear: left; }
#fluid_short_news .shortpost { width: 20em;  display: box;}
#fluid_short_news .shortpost h4 { }

#fluid_short_news .shortpost {padding: 0.2em; margin: 0.5em !important;}
#shortpost0 { background-color: #ffbbbb; }
#shortpost1 { background-color: #ffcccc; }
#shortpost2 { background-color: #ffdddd; }
#shortpost3 { background-color: #ffeeee; }
#shortpost4 { background-color: #fff7f7; }
#shortpost5 { background-color: #ffeeee; }

</style>

<script type='text/javascript' src="/media/masonry.pkgd.js"></script>
<script type='text/javascript'>
$(document).ready(function() {

    var container = document.querySelector('#fluid_short_news');
    var msnry = new Masonry( container, {
      // options
      // columnWidth: 200,
      itemSelector: '.shortpost'
    });

    container = document.querySelector('#video-gallery-int');
    var msnry = new Masonry( container, {
      // options
      columnWidth: 100,
      itemSelector: '.video'
    });
});
</script>

<?php get_footer(); ?>