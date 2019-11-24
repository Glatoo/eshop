

<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
error_reporting(E_ERROR | E_WARNING | E_PARSE);
define('ROOT', dirname(__FILE__).DIRECTORY_SEPARATOR);
include ROOT."../../common/env.php"
?>

<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/style.css">

    <title><?php echo $title;?></title>
</head>
<body>
<div style="position: fixed; z-index: -99; width: 100%; height: 100%" id="vid">
    <iframe width="100%" height="120%" src="https://www.youtube.com/embed/BHACKCNDMW8?autoplay=1&controls=0&showinfo=0&autohide=1&hd=1&disablekb=1&mute=1&start=180"></iframe>
</div>
