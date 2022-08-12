<?php
//Get files in folder
$files = array_filter(glob("Hello/*"), "is_file");
//Loop through all folder contents
echo count($files);