<?php

function sanatize_output($code) { 

    $search = array( 

          

        // Remove whitespaces after tags 

        '/\>[^\S ]+/s', 

          

        // Remove whitespaces before tags 

         '/[^\S ]+\</s',

          
// Remove multiple whitespace sequences 

         '/(\s)+/s',
         '/<!--(.|\s)*?-->/'
       

        

    ); 

    $replace = array('>', '<', '\\1'); 

    $code = preg_replace($search, $replace, $code); 

    return $code; 
} 

// Cache the contents to a cache file
$cached = fopen($cachefile, 'w');

fwrite($cached, sanatize_output(ob_get_contents()));
fclose($cached);

ob_end_flush();

// Send the output to the browser
?>