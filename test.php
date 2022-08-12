<?php

$the_zip = new ZipArchive;
// Add zip filename which needs to unzip in this case is zipname.zip
$the_zip->open('zipname.zip');
// Extracts to current directory with name of extraxted folder as zipname
$the_zip->extractTo('./zipname');
//Close Zip
$the_zip->close();
echo "Unzipped ";