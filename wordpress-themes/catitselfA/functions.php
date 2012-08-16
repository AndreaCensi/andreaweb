<?php

// [pub_ref id="censi12ocra"] 
function pub_ref( $atts ) { 
    extract( shortcode_atts( array( 'id' => 0 ), $atts ) ); 
    $file_html = '/home/andrea/scm/andreaweb/src-wp-page/mybib/all.html.yaml.json';
    $file_bib = '/home/andrea/scm/andreaweb/src-wp-page/mybib/all.bib.json';
    $db_html = json_decode(file_get_contents($file_html), TRUE);
    $db_bib = json_decode(file_get_contents($file_bib), TRUE);
    
    if(array_key_exists($id,$db_html)) {
        $entry = $db_html[$id];
        #$ref = $entry['html_short'];
        $bib = $db_bib[$id];
        $js = "javascript:$(\"#{$id}\").toggle();";
        $bibtex = "<a class='pub-ref-bibtex-link' onclick='{$js}' href='javascript:void(0)'>bibtex</a><pre class='pub-ref-bibtex' id='{$id}' style='display: none;'>{$bib}</pre>";
        return "<p class='pub-ref-short'>{$entry}{$bibtex}</p>";
    } else {
        $known = implode(array_keys($db_html),', ');
        return "<p class='pub-ref-error' style='color: red;'> Publication id {$id} does not exist (known: {$known})</p>";     
    }
} 

add_shortcode( 'pub_ref', 'pub_ref' );


function print_file($file) {
    $contents = file_get_contents($file);
    if( false == $contents) {
        print ('Error with stream, getting file instead !<br />');
    } else {
        print($contents);
    }
}

$content_width = 1200;


// [external_md filename="/censi12ocra"] 

require_once '/usr/share/wordpress/wp-content/plugins/markdown-on-save-improved/markdown-extra/markdown-extra.php';
function external_md( $atts ) { 
    extract( shortcode_atts( array( 'filename' => 0 ), $atts ) ); 

    $contents = file_get_contents($filename);
    
    return markdown(do_shortcode($contents));
} 
add_shortcode( 'external_md', 'external_md' );

require_once '/usr/share/wordpress/wp-content/plugins/markdown-on-save-improved/markdown-extra/markdown-extra.php';

// [external_page page="research"] 
function external_page( $atts ) { 
    extract( shortcode_atts( array( 'page' => 0 ), $atts ) ); 

    $root = '/home/andrea/scm/andreaweb/src-wp-page/';
    $filename = $root."/".$page.".md";

    $footer = $root."/footer.md";

    if(file_exists($filename)) {
        $contents = file_get_contents($filename);
        if(file_exists($footer)) {
            $contents = $contents.file_get_contents($footer);
        }
        $html = markdown(do_shortcode($contents)); 
        $html = "<div markdown=0 class='external-page' id='{$page}'>\n{$html}\n</div>";
        return $html;
    } else {
        $msg = "Page <tt>{$page}</tt> does not exist.";
        $warning = "<p class='external_page-error' style='color: red;'>{$msg}</p>";     
        return $warning;
    }
} 
add_shortcode( 'external_page', 'external_page' );


?>