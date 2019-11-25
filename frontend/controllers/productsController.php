<?php

define('ROOT', dirname(__FILE__) . DIRECTORY_SEPARATOR);
include ROOT . "../../common/env.php";

function get_products($ammount){
    $conn = new mysqli(DB_server, DB_username, DB_password, DB_name);
    if ($conn->connect_error) {
        echo $conn->connect_error;
        return -2;
    }
    $res = $conn->query("SELECT * FROM products WHERE id < $ammount");
    while($row = $res->fetch_row()){

    }
}