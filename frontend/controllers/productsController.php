<?php

define('ROOT', dirname(__FILE__) . DIRECTORY_SEPARATOR);
include ROOT . "../../common/env.php";

function get_categories(){
    $conn = new mysqli(DB_server, DB_username, DB_password, DB_name);
    if ($conn->connect_error) {
        echo $conn->connect_error;
        return -1;
    }
    $res = $conn->query("SELECT name FROM categories");
    $categories = array();
    while($row = $res->fetch_row()){
        array_push($categories, $row[0]);
    }
    return $categories;

}

function get_products($amount, $categories = null){
    $conn = new mysqli(DB_server, DB_username, DB_password, DB_name);
    if ($conn->connect_error) {
        echo $conn->connect_error;
        return -2;
    }
    if($categories == null) {
        $res = $conn->query("SELECT name, description, price, image  FROM products LIMIT " . $amount);
    }else{
        $str_categories = "'%".$categories[0]."%' ";
        for ($i = 1; $i < count($categories); $i++){
            $str_categories.="AND categories LIKE '%".$categories[$i]."%' ";
        }
        $str = "SELECT name, description, price, image FROM products WHERE categories LIKE '".$str_categories."' LIMIT ".$amount;
        echo "<p style='color: white'>".$str."</p>";
        $res = $conn->query("SELECT name, description, price, image FROM products WHERE categories LIKE ".$str_categories." LIMIT ".$amount);
    }
    $products = array();
    while($row = $res->fetch_row()){
        array_push($products, $row);
    }
    $conn->close();
    return $products;
}