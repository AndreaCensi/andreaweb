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
    extract( shortcode_atts( array( 'id' => 0 ), $atts ) ); 

    $ref_desc = pub_ref( $atts );

    $entry = read_pub_entry($id);
    $fields = $entry['fields'];
    $extra_html = '';
    if (array_key_exists("pdf", $fields)) {
        $pdf_url = $fields['pdf'];
        $pdf_png = create_pdf_preview($id, $pdf_url);
        $x = "<div class='pdf-preview paper'><a href='$pdf_url'><img src='{$pdf_png}'/><br/>paper</a></div>";
        $extra_html  = $extra_html . $x;
    } 

    if (array_key_exists("slides", $fields)) {
        $slides_url = $fields['slides'];
        $slides_id = "{$id}-slides";
        $slides_png = create_pdf_preview($slides_id, $slides_url);
        $x = "<div class='pdf-preview slides'><a href='$slides_url'><img src='{$slides_png}'/><br/>slides</a></div>";
        $extra_html  = $extra_html . $x;
    } 
    $extra_html= "<div class='previews'>$extra_html</div><div class='after-previews'></div>";
    return "<div class='pub_ref_page'>{$ref_desc}{$extra_html}</div>";
}

add_shortcode( 'pub_ref_page', 'pub_ref_page' );


function pub_ref_desc( $atts ) { 
    extract( shortcode_atts( array( 'id' => 0 ), $atts ) ); 
    $entry = read_pub_entry($id);
    if ($entry==0) {
        return "Could not find publication.";
    }

    // $file_bib = '/home/andrea/scm/andreaweb/src-wp-page/mybib/all.extra.json';
    // $db_bib = json_decode(file_get_contents($file_bib), TRUE);    
    // if(array_key_exists($id, $db_bib)) {
    //     $entry = $db_bib[$id];
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
} 

add_shortcode( 'pub_ref_desc', 'pub_ref_desc' );
function read_pub_entry($id) {
    $file_bib = '/home/andrea/scm/andreaweb/src-wp-page/mybib/all.extra.json';
    $db_bib = json_decode(file_get_contents($file_bib), TRUE);    
    if(array_key_exists($id, $db_bib)) {
        $entry = $db_bib[$id];
        return $entry;
    } else {
        $known = implode(array_keys($db_bib),', ');
        return "<p class='pub-ref-desc-error' style='color: red;'> Publication id {$id} does not exist (known: {$known})</p>";     
        return 0;
    }
}

function create_pdf_preview($id, $pdf_url) {
    $preview_dir = '/home/andrea/scm/andreaweb/src/media/pdf_preview';
    $preview_url = 'http://andrea.caltech.edu/media/pdf_preview';
    $png = "$preview_dir/{$id}.png";
    $url = "$preview_url/{$id}.png";
    if (!file_exists($png)) {
        // echo "The file $png does not exist... converting.";
        $cmd = "convert -density 20 -depth 8 -quality 85 {$pdf_url}[0] $png &";
        // echo "<br/> $cmd";
        // echo $cmd
        exec($cmd);    
    }
    return $url;
}

function pub_ref_extra($atts) {
    extract( shortcode_atts( array( 'id' => 0 ), $atts ) ); 
    $entry = read_pub_entry($id);
    if ($entry==0) {
        return "Could not find publication.";
    }
    $fields = $entry['fields'];
    // return implode(array_keys($fields),', ');
    
    $html = '';
    if (array_key_exists("pdf", $fields)) {
        $pdf_url = $fields['pdf'];
        $png = create_pdf_preview($id, $pdf_url);
        $html = $html."<img src='{$png}' class='pdf-preview'/>";
        
    } else {
        $known = implode(array_keys($fields, ', '));
        return "No key pdf in {$known}";
    }

    if (array_key_exists("slides", $fields)) {
        $slides_url = $fields['slides'];
        $slides_id = "{$id}-slides";
        $slides_png = create_pdf_preview($slides_id, $slides_url);
        $html = $html . "<img src='{$slides_png}' class='pdf-preview'/>";
    } 
    
    return $html; 
}

add_shortcode( 'pub_ref_extra', 'pub_ref_extra' );




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