<?php
//Get files in folder
$files = array_filter(glob("Hello/*"), "is_file");
//Loop through all folder contents
foreach ($files as $f) { 
    if(is_file($f)){
        echo count($f); //This variable is the files in folder
    }
}