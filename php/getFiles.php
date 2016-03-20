<?php require 'filefinder.php' ?>
<?php

$files = scanDir::scan($_GET["folder"]);

foreach($files as $value){
	echo "$value,";
}

?>