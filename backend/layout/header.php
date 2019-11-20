<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
//header('Content-type: text/plain; charset=utf-8');
define('ROOT', dirname(__FILE__).DIRECTORY_SEPARATOR);
include ROOT."../../common/env.php"
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
          -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">

    <title><?php echo $title;?> (Admin)</title>
</head>
<body>
