<?php

// [pub_ref id="censi12ocra"] 
function pub_ref( $atts ) { 
    extract( shortcode_atts( array( 'id' => 0 ), $atts ) ); 
    $file_bib = '/home/andrea/scm/andreaweb/src-wp-page/mybib/all.extra.json';
    $db_bib = json_decode(file_get_contents($file_bib), TRUE);    
    if(array_key_exists($id, $db_bib)) {
        $entry = $db_bib[$id];
        $bibtex = $entry['bibtex'];
        $html_short = $entry['html_short'];
        $js = "javascript:$(\"#{$id}\").toggle();";
        $bib = "<a class='pub-ref-bibtex-link' onclick='{$js}' href='javascript:void(0)'>bibtex</a><pre class='pub-ref-bibtex' id='{$id}' style='display: none;'>{$bibtex}</pre>";
        return "<p class='pub-ref-short'>{$html_short}{$bib}</p>";
    } else {
        $known = implode(array_keys($db_bib),', ');
        return "<p class='pub-ref-error' style='color: red;'> Publication id {$id} does not exist (known: {$known})</p>";     
    }
} 

add_shortcode( 'pub_ref', 'pub_ref' );


function pub_ref_page( $atts ) { 
    $ref_desc = pub_ref( $atts );
    return "<div class='pub_ref_page'>{$ref_desc}</div>";
}

add_shortcode( 'pub_ref_page', 'pub_ref_page' );


function pub_ref_desc( $atts ) { 
    extract( shortcode_atts( array( 'id' => 0 ), $atts ) ); 
    $file_bib = '/home/andrea/scm/andreaweb/src-wp-page/mybib/all.extra.json';
    $db_bib = json_decode(file_get_contents($file_bib), TRUE);    
    if(array_key_exists($id, $db_bib)) {
        $entry = $db_bib[$id];
        $bibtex = $entry['bibtex'];
        $html_short = $entry['html_short'];

        $fields = $entry['fields'];
        if (array_key_exists("desc", $fields)) {
            $desc_md = $fields['desc'];
            $d = markdown(do_shortcode($desc_md));  
        } else {
            $d = '';
        }
        if (array_key_exists("descicon", $fields)) {
            $src = $fields['descicon'];
            $icon = "<img class='icon' src='{$src}'/>";
        } else {
            $icon = "";
        }
        $desc = "<div class='desc' markdown='0'>{$d}</div>";
        $short = pub_ref(array('id'=>$id));
        $s = "<div class='pub-ref-desc'>{$icon}{$short}{$desc}</div>";
        return $s;
    } else {
        $known = implode(array_keys($db_bib),', ');
        return "<p class='pub-ref-desc-error' style='color: red;'> Publication id {$id} does not exist (known: {$known})</p>";     
    }
} 

add_shortcode( 'pub_ref_desc', 'pub_ref_desc' );


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