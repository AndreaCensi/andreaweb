<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>

<!--<aside class='widget widget_pages' id='aside-front'>
    <ul>
<?php wp_list_pages(array('title_li' => '', 'depth'=>2)); ?>  
    </ul>
</aside>-->

<style type='text/css'>
header { display: none;}
</style>


<!-- <div id="content" class="narrowcolumn" role="main"> -->

<?php include('/home/andrea/scm/andreaweb/src-wp-page/new-desc.html'); ?>
<!-- </div>
 -->

<img src='/media/want-you.png' id='want-you'/>
<style type='text/css'>
    img#want-you { 
        float: left; 
        height: 10em;
/*        border:solid 1px red;
*/        margin-top: 3em;
margin-left: 1em;
margin-right: -1em;
    }
    
</style>



    <div id='short_news_and_travel_'>
        <h3>What's new</h3>
        <div id='fluid_short_news'>
             <?php
                function print_tag_icon( $name ) { 
                    print("<img src='/media/post_icons/{$name}.png' class='post_icon post_{$name}'/>");
                }

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
                        <?php 
                            // $tags = get_tags(); 
                            $recognized = array('code', 'coverage', 'talks', 'paper', 'travel');
                            foreach($recognized as $t) {
                                if (has_tag($t)) {
                                    print_tag_icon($t);
                                }
                            }
                        ?>
                        <div class="entry"><?php the_content(); ?></div>
                    </div>
            <? endwhile; ?>
            <?php remove_filter('posts_where', 'filter_where'); ?>
 
            <div class='shortpost'>
            <a class='older' id='older-news' href='/misc/old-news'>Older news... </a>
            </div>
        </div>
        
    </div>



<!--
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
-->

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
#fluid_short_news { height: 35em; width: 100%;}
#fluid_short_news { clear: left; }
#fluid_short_news .shortpost { width: 20em;  display: box;}
#fluid_short_news .shortpost h4 { }

#fluid_short_news .shortpost {padding: 0.4em; margin-bottom: 2em;}
#fluid_short_news .shortpost {background-color: #fffafa; }
#fluid_short_news #shortpost0  { background-color: #ffbbbb; }
#fluid_short_news #shortpost1  { background-color: #ffcccc; }
#fluid_short_news #shortpost2  { background-color: #ffdddd; }
#fluid_short_news #shortpost3  { background-color: #ffeeee; }
#fluid_short_news #shortpost4  { background-color: #fff7f7; }
#fluid_short_news #shortpost5  { background-color: #ffeeee; }


</style>

<script type='text/javascript' src="/media/masonry.pkgd.js"></script>
<script type='text/javascript'>
$(document).ready(function() {

    var container = document.querySelector('#fluid_short_news');
    var msnry = new Masonry( container, {
      // options
      // columnWidth: 200,
      itemSelector: '.shortpost',
      gutter: 10,
    });

    container = document.querySelector('#video-gallery-int');
    var msnry = new Masonry( container, {
      // options
      columnWidth: 100,
      itemSelector: '.video'
    });


    container = document.querySelector('#trailer-gallery-int');
    var msnry = new Masonry( container, {
      // options
      columnWidth: 100,
      itemSelector: '.video'
    });
});
</script>

<?php get_footer(); ?>