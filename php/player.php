<?php require 'filefinder.php' ?>
<?php

$file_ext = array("mp3");

$files = scanDir::scan("../musicFiles",$file_ext, true);

//echo var_dump($files);

foreach($files as $value){
	echo "$value,";
}

?>