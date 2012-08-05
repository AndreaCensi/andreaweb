<?php
/*
Template Name: nonews
*/
?>

<?php
get_header(); ?> 

		<div id="primary">
			<div id="content" role="main">
			
			<!-- http://wordpress.org/support/topic/older-posts-feature-not-working -->

<?php
$temp = $wp_query;
$wp_query= null;
$wp_query = new WP_Query();
$wp_query->query('showposts=1'.'&cat=-12&paged='.$paged);
?>

<!--<div class="navigation">
  <div class="alignleft"><?php previous_posts_link('&laquo; Next') ?></div>
  <div class="alignright"><?php next_posts_link('Previous &raquo;') ?></div>
</div>-->

<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
	<?php get_template_part( 'content', get_post_format() ); ?>
<?php endwhile; ?>

<div class="navigation">
  <div class="alignleft"><?php previous_posts_link('&laquo; Next') ?></div>
  <div class="alignright"><?php next_posts_link('Previous &raquo;') ?></div>
</div>
<?php $wp_query = null; $wp_query = $temp;?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

