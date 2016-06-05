<?php
header("X-Frame-Options: DENY");
header("Content-Security-Policy: frame-ancestors 'none'", false);
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Files</title>
    <link href="css/main.css" type="text/css" rel="stylesheet"/>
    <link href="css/files.css" type="text/css" rel="stylesheet"/>
    <style>
        html { display : none; }
    </style>
    <noscript>
        <style>
            html { display : block; }
        </style>
    </noscript>
</head>

<body>
<?php include 'header.html' ?>
<div class="content">
    <ul id="fileList">
    </ul>
</div>
<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/files.js"></script>
<script type="text/javascript">folder = "uploads";
    getFiles();</script>
</body>
<script>
    if (self == top) {
        document.documentElement.style.display = 'block';
    } else {
        top.location = self.location;
    }
</script>
</html>