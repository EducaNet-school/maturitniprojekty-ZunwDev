<?php 

function scan($link) {
    foreach(scandir($link) as $file) {
        if($file == '.' || $file == '..') continue;
        echo $file . '<br>';
    }
}

scan(".");
echo "<br>";
scan("..");