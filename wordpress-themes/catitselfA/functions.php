<?php
use Symfony\Component\ClassLoader\UniversalClassLoader;
require_once '/usr/share/php/Symfony/Component/ClassLoader/UniversalClassLoader.php';
$loader = new UniversalClassLoader();
$loader->register();
$loader->registerNamespaces(array(
    'Symfony' => '/usr/share/php/Symfony/',
));
use Symfony\Component\Yaml\Parser;

require_once '/usr/share/php/Symfony/Component/Yaml/Parser.php';
require_once '/usr/share/php/Symfony/Component/Yaml/Inline.php';


function print_file($file) {
    $contents = file_get_contents($file);
    if( false == $contents) {
        print ('Error with stream, getting file instead !<br />');
    } else {
        print($contents);
    }
}

$content_width = 1200;


// [pub_ref id="censi12ocra"] 
function pub_ref( $atts ) { 
    extract( shortcode_atts( array( 'id' => 0 ), $atts ) ); 

    $file = '/home/andrea/scm/andreaweb/src-bib/extract/publications.yaml';
    $yaml = new Parser();
    $db = $yaml->parse(file_get_contents($file));
    
    if(array_key_exists($id,$db)) {
        $entry = $db[$id];
        $ref = $entry['html_short'];
        return "<p class='pub-ref-short'>{$ref}</p>";
    } else {
        $known = implode(array_keys($db),', ');
        return "<p class='pub-ref-error'> Publication id {$id} does not exist (known: {$known})</p>";     
    }
} 

add_shortcode( 'pub_ref', 'pub_ref' );

?>