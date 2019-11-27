<?php

namespace MyLibrary;

use mysqli;

define('ROOT', dirname(__FILE__) . DIRECTORY_SEPARATOR);
include ROOT . "../../common/env.php";

/**
 * Kontroler produktov
 *
 * Hlavna trieda pre produkty
 *
 * @author     Branislav Hozza <brankohozza@gmail.com>
 * @copyright  Branislav Hozza, All rights reserved.
 * @license    No License
 * @link       http://brano-shop.test
 */
class ProductController
{
    /**
     * Pridanie novej kategorie
     *
     * Funkcia prida novu categoriu do DB a overi existenciu kategorie.
     *
     * @param string $name Nazov kategorie.
     *
     * @return int Vraciam status:
     *       1 Kategoria bola pridana
     *      -1 Chybajuce data
     *      -2 Neplatne (prazdne udaje)
     *      -3 Pripojenie zlyhalo
     *      -4 Kategoria existuje
     *      -5 Zlyhalo pripravenie SQL pri ziskani kategorii
     *      -6 Zlyhalo pripravenie SQL pri vlozeni kategorie.
     */
    public static function add_category($name)
    {
        if (!isset($name)) {
            return -1;
        }
        if (strlen($name) == 0) {
            return -2;
        }
        $conn = new mysqli(DB_server, DB_username, DB_password, DB_name);
        if ($conn->connect_error) {
            echo $conn->connect_error;
            return -3;
        }
        if ($stmt = $conn->prepare('SELECT * FROM categories WHERE name=?')) {

            $stmt->bind_param("s", $name);

            $stmt->execute();

            $result = $stmt->get_result();

            $stmt->close();
            if ($stmt->num_rows > 0) {
                $conn->close();
                return -4;
            } else {
                if ($stmt = $conn->prepare("INSERT INTO categories (name) VALUES (?)")) {
                    $stmt->bind_param("s", $name);

                    $stmt->execute();

                    $stmt->close();
                    $conn->close();
                    return 1;
                } else {
                    echo $conn->error;
                    echo $stmt->error;
                    return -6;
                }
            }
        } else {
            $conn->close();
            return -5;
        }
    }

    /**
     * Ziskaj kategorie
     *
     * Funkcia vrati kategorie
     *
     * @return array Vraciam pole kategorii alebo prazdne pole:
     */
    public static function get_categories()
    {
        $conn = new mysqli(DB_server, DB_username, DB_password, DB_name);
        if ($conn->connect_error) {
            echo $conn->connect_error;
            return [];
        }
        $res = $conn->query("SELECT name FROM categories");
        $categories = array();
        while ($row = $res->fetch_row()) {
            array_push($categories, $row[0]);
        }
        return $categories;

    }

    /**
     * Pridaj produkt
     *
     * Funkcia prida produkt do DB.
     *
     * @param string $name Nazov produktu
     * @param string $description Popis produktu
     * @param float $price Cena produktu (v €)
     * @param string $image Obrazok produktu
     * @param array $categories Pole kategorii
     * @return int Vraciam status:
     *       1 Produkt bol pridany
     *      -1 Chybajuce data
     *      -2 Neplatne (prazdne udaje)
     *      -3 Pripojenie zlyhalo
     *      -4 Zlyhalo pripravenie SQL pri produktu.
     */
    public static function add_product($name, $description, $price, $image = "none.jpg", $categories = [])
    {
        if (!isset($name) || !isset($description) || !isset($price)) {
            return -1;
        }
        if (strlen($name) == 0 || strlen($description == 0) || strlen($price == 0)) {
            return -2;
        }
        $conn = new mysqli(DB_server, DB_username, DB_password, DB_name);
        if ($conn->connect_error) {
            echo $conn->connect_error;
            return -3;
        }
        $categories_str = $categories[0];
        for ($i = 1; $i < count($categories); $i++) {
            $categories_str .= "," . $categories[$i];
        }
        if ($stmt = $conn->prepare("INSERT INTO products (name, description, price, image, categories) VALUES (?,?,?,?,?)")) {
            $stmt->bind_param("ssdss", $name, $description, $price, $image, $categories_str);

            $stmt->execute();

            $stmt->close();
            $conn->close();
            return 1;
        } else {
            echo $conn->error;
            echo $stmt->error;
            return -4;
        }
    }

    /**
     * Ziskaj produkty
     *
     * Funkcia vrati produkty podla zadaneho mnozstva a kategorie, kategoria ale nie je potrebna.
     *
     * @param int $amount Pocet produktov
     * @param array $categories Pole vybratych kategorii
     * @return array Vraciam pole produktov. Ak prazdne pole tak nastala chyba alebo produkt neexistuje
     */
    public static function get_products($amount, $categories = null)
    {
        $conn = new mysqli(DB_server, DB_username, DB_password, DB_name);
        if ($conn->connect_error) {
            echo $conn->connect_error;
            return [];
        }
        if ($categories == null) {
            $res = $conn->query("SELECT name, description, price, image  FROM products LIMIT " . $amount);
        } else {
            $str_categories = "'%" . $categories[0] . "%' ";
            for ($i = 1; $i < count($categories); $i++) {
                $str_categories .= "AND categories LIKE '%" . $categories[$i] . "%' ";
            }
            $res = $conn->query("SELECT name, description, price, image FROM products WHERE categories LIKE " . $str_categories . " LIMIT " . $amount);
        }
        $products = array();
        while ($row = $res->fetch_row()) {
            array_push($products, $row);
        }
        $conn->close();
        return $products;
    }
}