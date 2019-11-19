<?php

define('ROOT', dirname(__FILE__) . DIRECTORY_SEPARATOR);
include ROOT . "../../common/env.php";

function login($name, $password)
{
    if (!isset($name) || !isset($password)) {
        return -1;
    }
    if (strlen($name) == 0 || strlen($password) == 0) {
        return -4;

    }
    echo $name . ":" . $password;
    $conn = new mysqli(DB_server, DB_username, DB_password, DB_name);
    if ($conn->connect_error) {
        echo $conn->connect_error;
        return -2;
    }
    if ($stmt = $conn->prepare('SELECT * FROM users WHERE username=? AND pass=?')) {

        $stmt->bind_param("ss", $name, $password);

        $stmt->execute();

        $result = $stmt->get_result();

        $i = $result->num_rows;
        $stmt->free_result();
        if ($i > 0) {
            $conn->close();
            return 1;
        } else {
            $conn->close();
            return -3;
        }
    }
    $conn->close();
    return -5;
}

function register()
{
    echo "Register";
}