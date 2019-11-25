<?php

define('ROOT', dirname(__FILE__) . DIRECTORY_SEPARATOR);
include ROOT . "../../common/env.php";

function get_articles($ammount){
    $conn = new mysqli(DB_server, DB_username, DB_password, DB_name);
    if ($conn->connect_error) {
        echo $conn->connect_error;
        return -2;
    }
    $res = $conn->query("SELECT * FROM blog WHERE id<".$ammount);
    $articles = array();
    while($row = $res->fetch_row()){
        array_push($articles, $row);
    }
    $conn->close();
    return $articles;
}