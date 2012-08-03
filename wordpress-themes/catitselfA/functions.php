<?php

function print_file($file) {
    $contents = file_get_contents($file);
    if( false == $contents) {
        print ('Error with stream, getting file instead !<br />');
    } else {
        print($contents);
    }
}

$content_width = 1200;

?>
