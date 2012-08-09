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

        <h3 id='what_new'> What's new </h3>

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
    <h3>Google+</h3>
<script type="text/javascript">
ww='600';wh='600';pid='106839984596770449716';

mbgc='ffffff';;mbc='ffffff';bbc='3F79D5';
bmobc='3b71c6';bbgc='4889F0';bmoc='3F79D5';bfc='FFFFFF';bmofc='ffffff';tlc='ffffff';
tc='6a6a6a';nc='6a6a6a';bc='6a6a6a';l='y';fs='18';fsb='15';bw='140';ff='4';lu='6a6a6a';
pc='4889F0';b='s'; </script>
<script type="text/javascript" src="http://widgetsplus.com/google_plus_widget.js">
</script>
<script type="text/javascript">
$(document).ready(function(){
    //$('#widget-gplus').css();
    $('#wgp_wrapper').css({'border': 'solid 1px red', 'width': '600'});
    $('#wgp_wrapper').width(600);
});
</script>
</div>


    <!-- preload images --> 
    <img src="media/portrait1.jpg" style='width:1px'/> 
    <img src="media/portrait2.jpg" style='width:1px'/> 

    </div>

<?php get_footer(); ?>