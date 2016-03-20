<?php

$message = "";
$target_path = "../uploads/";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if ( $_FILES['uploadedfile'] != "") {
		
		$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 
		
		if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
			$message =  "The file ".  basename( $_FILES['uploadedfile']['name']). 
			" has been uploaded<br/><br/>";
		} else{
			$message =  "There was an error uploading the file, please try again!<br/><br/>";
		}
	}
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>File Upload</title>
<link type="text/css" rel="stylesheet" href="../css/main.css" />
</head>

<body>
<?php include '../header.html' ?>
<?php echo $message ?>
<form enctype="multipart/form-data" action="index.php" method="POST">
Choose a file to upload: <input name="uploadedfile" type="file" /><br />
<input type="submit" value="Upload File" />
</form>
</body>
</html>