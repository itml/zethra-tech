<?php
use xPaw\MinecraftQuery;
use xPaw\MinecraftQueryException;

define('MQ_SERVER_ADDR', '192.168.0.2');
define('MQ_SERVER_PORT', 25565);
define('MQ_TIMEOUT', 1);

Error_Reporting(E_ALL | E_STRICT);
Ini_Set('display_errors', true);

require __DIR__ . '/php/MinecraftQuery.php';
require __DIR__ . '/php/MinecraftQueryException.php';

$Timer = MicroTime(true);

$Query = new MinecraftQuery();

try {
    $Query->Connect(MQ_SERVER_ADDR, MQ_SERVER_PORT, MQ_TIMEOUT);
} catch (MinecraftQueryException $e) {
    $Exception = $e;
}

$Timer = Number_Format(MicroTime(true) - $Timer, 4, '.', '');
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="css/main.css">
    <title>Zethra Tech</title>
</head>

<body background="assets/noisy-texture.png">
<?php //include 'header.html' ?>
<div id="header"></div>
<div id="content">
    <div style="text-align: center;">
        <h2>Zethra's Minecraft Server</h2>

        <h2>IP is: zethratech.com</h2>

	<h2><a href="http://map.zethratech.com" target="_blank">Server Map</a></h2>
	
        <?php
        $Info = $Query->GetInfo();
        if (isset($Exception)) {
            //echo htmlspecialchars($Exception->getMessage());
            //echo nl2br($e->getTraceAsString(), false);
            echo '<h2><span style="color: #C51013; ">The Server is offline!</span></h2>';
        } else {
            echo '<h2><span style="color: #3ADF00; ">The Server is currently Online <br>
                    Currently there are ' . $Info["Players"] . ' players online
                    of a maximum of ' . $Info["MaxPlayers"] . '.</span></h2>';
        }
        $Players = $Query->GetPlayers();
        if (!is_null($Players) && is_array($Players)) {
            echo '<h2><span style="color: #3ADF00; ">Players: <br/>';
            foreach ($Players as $Player) {
                echo htmlspecialchars($Player) . '<br/>';
            }
            echo '</span></h2>';
        }
        ?>

        <p>If the server is down unexpectedly please contact me</p>
    </div>
</div>

</body>
</html>
