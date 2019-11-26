<?php
namespace MyLibrary;
use mysqli;
define('ROOT', dirname(__FILE__) . DIRECTORY_SEPARATOR);
include ROOT . "../../common/env.php";
/**
 * Hlavna trieda pre blogy
 *
 * @author     Branislav Hozza
 * @copyright  Branislav Hozza, All rights reserved.
 * @license    No License
 * @link       http://brano-shop.test
 */
class BlogController
{
    /**
     * Funkcia vrati clanky
     *
     * @param int $ammount Pocet zobrazenych clankov
     *
     * @return array Vraciam pole clankov alebo prazdne pole:
     */
    static function get_articles($ammount)
    {
        $conn = new mysqli(DB_server, DB_username, DB_password, DB_name);
        if ($conn->connect_error) {
            echo $conn->connect_error;
            return [];
        }
        $res = $conn->query("SELECT * FROM blog WHERE id<" . $ammount);
        $articles = array();
        while ($row = $res->fetch_row()) {
            array_push($articles, $row);
        }
        $conn->close();
        return $articles;
    }
}