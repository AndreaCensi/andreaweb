<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>
 
    <div id="content" class="narrowcolumn" role="main">
    

    <?php print_file('/home/andrea/scm/andreaweb/src-index/intro.html'); ?>

    <div id='short_news'>
        <div id="travel">
            <?php print_file('/home/andrea/scm/andreaweb/src-index/plans.html'); ?>
            <div style='clear:both'> </div>
        </div>

        <h3 id='short_news_title'> Short news </h3>
        <?php
            function filter_where($where = '') {
                $where .= " AND post_date >= '" . date('Y-m-d', strtotime('-180 days')) . "'";
                return $where;
            }
            add_filter('posts_where', 'filter_where');

            $q = 'cat=12';
            $q = $q . '&orderby=date&order=desc&posts_per_page=100';
            query_posts($q);

            while (have_posts()) : the_post();?>
                <div class='shortpost'>
                    <h4> <span class='date'><?php the_time('Y-m-d') ?> </span>
                         <a href="<?php the_permalink() ?>" rel="bookmark" class='title'>
                            <?php the_title(); ?>
                         </a>
                    </h4>
                    <div class="entry"><?php the_content(); ?></div>
                </div>
        <? endwhile; ?>
        <?php remove_filter('posts_where', 'filter_where'); ?>
        <a class='older' id='older-news' href='/misc/old-news'>Older news... </a>
    </div>
    
    <div id='research_items'> 

	<h3 id='what_new'> What's new 
<span id="rsslink">(<a rel="external nofollow" id="feedrss" title="Get website updates as RSS" href="http://purl.org/censi/feed"><img src='media/rss.gif' alt='RSS'/>RSS feed</a>)</span>
</h3>

        <?php
            //query_posts('tag="research-item"'.'&orderby=date&order=desc');
            query_posts('cat=-12'.'&orderby=date&order=desc'.'&posts_per_page=5');
            $i = 0 ;
            while (have_posts()) : the_post(); $i++; 
                $link = 'blog/page/'.$i.'/';
                // get_the_permalink()
            ?>
                <div class='post'>
                    <h4> <span class='date'><?php the_time('Y-m-d') ?> </span>
                        <a href="<?php the_permalink() ?>" rel="bookmark">
                            <?php the_title(); ?>
                        </a>
                    </h4>
                    <!-- <div class="entry"><?php the_content(); ?></div> -->
                    <div class="entry"><?php the_excerpt(); ?></div>
                </div>
        <? endwhile; ?>
        <a class='older' id='older-posts' href='/blog/page/5/'>Older posts... </a>
    </div>

    

    <?php 
    //    wp_get_archives('title_li=&type=postbypost&limit=10'); 
    ?>

    <div id="CHEWBA_61e5">
        <h3>Coding activity</h3>
     Last commits to public repositories in   <a href="http://github.com/AndreaCensi">my github account</a>:
            <ul><li/></ul>
    </div>
 
<script type="text/javascript">
//<![CDATA[
var CHEWBA_61e5 = window.CHEWBA_61e5 || {};
CHEWBA_61e5.badger = function() {
    var $ = {};
    return {
        init: function(theBadge) {
            $.theFeed = document.getElementById(theBadge).getElementsByTagName("ul")[0];
            //$.theFeed = document.getElementById(theBadge).getElementsByTagName("ul")[0];
        },
        pingFeed: function(feed) {
            $.theFeed.innerHTML = "";
            if (feed.value.items.length) {
                for (var i = 0; i < 15; i++) {
                    var li = document.createElement("li");
                    var a = document.createElement("a");
                    a.innerHTML = feed.value.items[i].title;
                    a.href = feed.value.items[i].link;
                    a.target = "_blank";
                    li.appendChild(a);

                    /*var d = feed.value.items[i].pubDate;
                    d = " - " + d.substring(0, d.lastIndexOf("2008") + 4);
                    li.appendChild(document.createTextNode(d));*/
                    $.theFeed.appendChild(li);
                }
            }
        }
    };
} ();
CHEWBA_61e5.badger.init("CHEWBA_61e5"); 
//]]>
</script>
<script type='text/javascript' src="http://pipes.yahoo.com/pipes/zIQi0Iy72xGJ3NMhJhOy0Q/run?_render=json&amp;_callback=CHEWBA_61e5.badger.pingFeed&amp;s=http://github.com/AndreaCensi.atom"></script>

<div id='widget-gplus'>
   
<!--Place the code below where you want the widget to render-->
<div id="gpluswidget" data-id="106839984596770449716" data-key="AIzaSyAmCrdKWfCqbw5eRHwXftqetgnIliTwIcc" 
data-posts="10" data-lang="yes" data-width="400" data-bkg="transparent" data-padding="10" data-border="f5f5f5" data-radius="0" data-txt="0c0c0c" data-link="36c" data-favicon="yes" data-header="yes" data-footer="yes" data-page="no"></div>
<script type="text/javascript" src="http://gplusapi.googlecode.com/files/widget0.js"></script>
</div>


    <!-- preload images --> 
    <img src="media/portrait1.jpg" style='width:1px'/> 
    <img src="media/portrait2.jpg" style='width:1px'/> 

    </div>

<?php get_footer(); ?>