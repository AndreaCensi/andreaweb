<?php
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?>
			<span class='date'><?php the_time('Y-m-d') ?>
		</h1>
	</header><!-- .entry-header -->



	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'twentyeleven' ) . '</span>', 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	<footer class="entry-meta">
		<?php edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->

<?php $key="purl"; 
	$purl =  get_post_meta($post->ID, $key, true); 

	if($purl != '') {
?>
<p class='purl-notice'>
Please link here using the <a href="http://purl.org">PURL</a>: 
	<a class='purl' href="<?php echo $purl ?>"><?php echo $purl ?></a>.
</p>
<?php } ?>