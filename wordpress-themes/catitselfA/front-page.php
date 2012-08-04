<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>
 
    <div id="content" class="narrowcolumn" role="main">

        <!--
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="post" id="post-<?php the_ID(); ?>">
        <h2><?php the_title(); ?></h2>

            <div class="entry">
                <?php the_content('<p class="serif">' . __('Read the rest of this page &raquo;', 'kubrick') . '</p>'); ?>

                <?php wp_link_pages(array('before' => '<p><strong>' . __('Pages:', 'kubrick') . '</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

            </div>
        </div>
        <?php endwhile; endif; ?>
        -->
    

    <?php print_file('/home/andrea/scm/andreaweb/src-index/intro.html'); ?>


<!--
<div id="news">

    <h4 style="clear:left; padding-top: 3em;">News 
    <span id="rsslink">(<a rel="external nofollow" id="feedrss" 
        title="Get website updates as RSS" href="http://purl.org/censi/feed"><img src='media/rss.gif' alt='RSS'/>RSS feed</a>)</span>
    </h4>
    
<?php 
     // print_file('/home/andrea/scm/andreaweb/src-news/news.html'); 
?>
</div>
-->
    <div id='short_news'>
        <div id="travel">
            <?php print_file('/home/andrea/scm/andreaweb/src-index/plans.html'); ?>
            <div style='clear:both'> </div>
        </div>


        <h3 id='short_news_title'> Short news </h3>
        <?php
            query_posts('cat=12'.'&orderby=date&order=desc&posts_per_page=50');
            while (have_posts()) : the_post();?>
                <div class='shortpost'>
                    <h4> <small><?php the_time('Y-m-d') ?> </small>
                         <a href="<?php the_permalink() ?>" rel="bookmark" class='title'>
                            <?php the_title(); ?>
                         </a>
                    </h4>
                    <div class="entry"><?php the_content(); ?></div>
                </div>
        <? endwhile; ?>
    </div>
    
    <div id='research_items'> 

        <h3 id='what_new'> What's new </h3>

        <?php
            //query_posts('tag="research-item"'.'&orderby=date&order=desc');
            query_posts('cat=-12'.'&orderby=date&order=desc');
            while (have_posts()) : the_post();?>
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

    </div>

    

    <?php 
    //    wp_get_archives('title_li=&type=postbypost&limit=10'); 
    ?>

    </div>

<?php get_footer(); ?> 
