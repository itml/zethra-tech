<?php
header("X-Frame-Options: DENY");
header("Content-Security-Policy: frame-ancestors 'none'", false);
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Zethra Tech</title>
    <link type="text/css" rel="stylesheet" href="css/main.css"/>
    <style>
        html {
            display: none;
        }
    </style>
    <noscript>
        <style>
            html {
                display: block;
            }
        </style>
    </noscript>
</head>

<body>
<?php include 'header.html' ?>
<div class="content">
    <h1>Welcome to ZethraTech.com</h1>
    <p>This website is a repository of my various works as well a host for various servers I run from time to time
        including a Minecraft server</p>
</div>
</body>
<script>
    if (self == top) {
        document.documentElement.style.display = 'block';
    } else {
        top.location = self.location;
    }
</script>
</html>
