<?php
/*
Template Name: news
*/
?>

<?php
get_header(); ?> 

		<div id="primary">
			<div id="content" role="main">
			
			<?php 
	        function filter_older($where = '') {
	            $where .= " AND post_date <= '" . date('Y-m-d', strtotime('-180 days')) . "'";
    	        return $where;
        	}
        	add_filter('posts_where', 'filter_older');

			query_posts('cat=12&orderby=date&order=desc&posts_per_page=500'); ?>

		
			<?php while ( have_posts() ) : the_post(); ?>

				<div class='shortpost'>
                <h4> <small><?php the_time('Y-m-d') ?> </small>
                     <a href="<?php the_permalink() ?>" rel="bookmark" class='title'>
                        <?php the_title(); ?>
                     </a>
                </h4>
                <div class="entry"><?php the_content(); ?></div>
            </div>

			<?php endwhile; ?>
 
			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>