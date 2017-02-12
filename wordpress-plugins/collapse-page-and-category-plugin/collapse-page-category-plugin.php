<?PHP
/*
Plugin Name: Collapse Page and Category Plugin
Plugin URI: http://www.BlogsEye.com/
Description: Uses Javascript to collapse children on Pages and Categories or any List that uses the css class 'children'
Version: 1.5
Author: Keith P. Graham
Author URI: http://www.BlogsEye.com/

This software is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

/************************************************************
* 	kpg_pagecollapse_fixup()
*	Shows the javascript in the footer so that the image events can be adjusted
*
*************************************************************/
function kpg_pagecollapse_fixup() {
	// this is the Page Collapse functionality.
	remove_action( 'wp_footer', 'kpg_pagecollapse_fixup' );
	remove_action( 'get_footer', 'kpg_pagecollapse_fixup' );
	$dir = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__));
	$js = addslashes($dir.'collapse-page-category-plugin.js');
	$checktypes="true"; // perhaps in the next release I'll make this an option.
	
?>
<!-- added by open in collapse category plugin -->
<script language="javascript" type="text/javascript" src="<?php echo $js; ?>"></script>
<!-- end of collapse category plugin -->

<?php
}
function kpg_pagecollapse_control()  {
// this is the display of information about the page.
?>
<div class="wrap">
<h2>Collapse Page and Category Plugin</h2>
<h4>The Collapse Page and Category Plugin is installed and working correctly.</h4><div style="position:relative;float:right;width:35%;background-color:ivory;border:#333333 medium groove;padding:4px;margin-left:4px;">
    <p>This plugin is free and I expect nothing in return. If you would like to support my programming, you can buy my book of short stories.</p>
    <p>Some plugin authors ask for a donation. I ask you to spend a very small amount for something that you will enjoy. eBook versions for the Kindle and other book readers start at 99&cent;. The book is much better than you might think, and it has some very good science fiction writers saying some very nice things. <br/>
      <a target="_blank" href="http://www.amazon.com/gp/product/1456336584?ie=UTF8&tag=thenewjt30page&linkCode=as2&camp=1789&creative=390957&creativeASIN=1456336584">Error Message Eyes: A Programmer's Guide to the Digital Soul</a></p>
    <p>A link on your blog to one of my personal sites would also be appreciated.</p>
    <p><a target="_blank" href="http://www.WestNyackHoney.com">West Nyack Honey</a> (I keep bees and sell the honey)<br />
      <a target="_blank" href="http://www.cthreepo.com/blog">Wandering Blog</a> (My personal Blog) <br />
      <a target="_blank" href="http://www.cthreepo.com">Resources for Science Fiction</a> (Writing Science Fiction) <br />
      <a target="_blank" href="http://www.jt30.com">The JT30 Page</a> (Amplified Blues Harmonica) <br />
      <a target="_blank" href="http://www.harpamps.com">Harp Amps</a> (Vacuum Tube Amplifiers for Blues) <br />
      <a target="_blank" href="http://www.blogseye.com">Blog&apos;s Eye</a> (PHP coding) <br />
      <a target="_blank" href="http://www.cthreepo.com/bees">Bee Progress Beekeeping Blog</a> (My adventures as a new beekeeper) </p>
  </div>
<p>This plugin installs some javascript in the footer of every page. Javascript detects any list items with a class of 'children'. It hides the children in the tree and sets a click event that will expand or re-collapse them. The action uses only css and javascript and occurs after your page loads, so that search engines will see the whole tree before it is collapsed.</p>
<p>Wordpress uses the 'children' css class when it displays pages and categories in unordered lists, but you can put anything in an unordered list with a UL css class of 'children' and the javascript will collapse or expand it for you. </p>
<p>The javascript adds a triangle character to the front of the parent's of children which is the clickable item.</p>
<p>Note: The plugin will not work with themes and widgets that overwrite the default behavior of WordPress.</p>
<p>There are no configurations options. The plugin is on when it is installed and enabled. To turn it off just disable the plugin from the plugin menu.</p>
<p>People wanted to uncollapse and recollapse the menu. This is done now with a right click.</p>

</div>
<?php
}
// no unistall because I have not created any meta data to delete.
function kpg_pagecollapse_init() {
   add_options_page('Page Collapse', 'Page Collapse', 'manage_options',__FILE__,'kpg_pagecollapse_control');
}
  // Plugin added to Wordpress plugin architecture
	add_action('admin_menu', 'kpg_pagecollapse_init');	
	add_action( 'wp_footer', 'kpg_pagecollapse_fixup' );
	add_action( 'get_footer', 'kpg_pagecollapse_fixup' );

	
?>