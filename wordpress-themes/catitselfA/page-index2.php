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


<?php 
    render_plus_shortcode('/home/andrea/scm/andreaweb/src-wp-page/new-desc.html');
?>


<?php get_footer(); ?>