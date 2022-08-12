<?php

//Getting subfolders in a folder
$dir    = 'Hello';
$files1 = scandir($dir);

for($i=0;$i<count($files1); $i++) {
    if($files1[$i] != "." && $files1[$i] != ".."){
        echo $files1[$i] . "<br><br>";

    }
}


