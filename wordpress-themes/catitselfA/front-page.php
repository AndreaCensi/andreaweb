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
        <a class='older' id='older-news' href='/old-news'>Older news... </a>
    </div>
    
    <div id='research_items'> 

        <h3 id='what_new'> What's new </h3>

        <?php
            //query_posts('tag="research-item"'.'&orderby=date&order=desc');
            query_posts('cat=-12'.'&orderby=date&order=desc'.'&posts_per_page=5');
            $i = 0 ;
            while (have_posts()) : the_post(); $i++; 
                $link = 'blog/page/'.$i;
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
        <a class='older' id='older-posts' href='/blog/page/5'>Older posts... </a>
    </div>

    

    <?php 
    //    wp_get_archives('title_li=&type=postbypost&limit=10'); 
    ?>

    </div>

<?php get_footer(); ?> 
