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
    public static function add_category($name, $type)
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
        if ($stmt = $conn->prepare('SELECT * FROM categories WHERE value=? AND sub_category=?')) {

            $stmt->bind_param("ss", $name, $type);

            $stmt->execute();

            $result = $stmt->get_result();

            $stmt->close();
            if ($result->num_rows > 0) {
                $conn->close();
                return -4;
            } else {
                if ($stmt = $conn->prepare("INSERT INTO categories (value, sub_category) VALUES (?, ?)")) {
                    $stmt->bind_param("ss", $name, $type);

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
     * @param string $type Typ kategorie(Brand/Type/Size)
     * @return array Vraciam pole kategorii podla typu alebo prazdne pole:
     */
    public static function get_categories($type)
    {
        $conn = new mysqli(DB_server, DB_username, DB_password, DB_name);
        if ($conn->connect_error) {
            echo $conn->connect_error;
            return [];
        }
        if ($stmt = $conn->prepare("SELECT (value) FROM categories WHERE sub_category=?")) {
            $stmt->bind_param("s", $type);
            $stmt->execute();
            $res = $stmt->get_result();
            $categories = array();
            while ($row = $res->fetch_row()) {
                array_push($categories, $row[0]);
            }
            return $categories;
        } else {
            return [];
        }

    }

    /**
     * Pridaj produkt
     *
     * Funkcia prida produkt do DB.
     *
     * @param string $name Nazov produktu
     * @param float $price Cena produktu (v ?)
     * @param string $brand Znacka
     * @param int $size Velkost
     * @param string $type Druh
     * @param string $image Obrazok produktu
     * @param string $description Popis produktu
     * @return int Vraciam status:
     *       1 Produkt bol pridany
     *      -1 Chybajuce data
     *      -2 Neplatne (prazdne udaje)
     *      -3 Pripojenie zlyhalo
     *      -4 Zlyhalo pripravenie SQL pri hladani produktu.
     *      -5 Produkt uz existuje
     *      -6 Nepodarilo sa vykonat sql
     *      -7 Zlyhalo pripravenie SQL pri vkladani produktu.
     */
    public static function add_product($name, $price, $brand, $size, $type, $image = "none.jpg", $description = "")
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
        if ($stmt = $conn->prepare("SELECT * FROM products WHERE name = ? ")) {
            $stmt->bind_param("s", $name);

            $stmt->execute();
            $res = $stmt->get_result();
            if ($res->num_rows > 0) {
                $stmt->close();
                $conn->close();
                return -5;
            } else {
                if ($stmt = $conn->prepare("INSERT INTO products (name, description, size, brand, type, price, image) VALUES (?, ?, ?, ? ,? ,? ,?)")) {
                    $stmt->bind_param("ssissds", $name, $description, $size, $brand, $type, $price, $image);
                    $stmt->execute();
                    $res = $stmt->get_result();
                    if ($res) {
                        return 1;
                    } else {
                        return -6;
                    }
                }else{
                    return  -7;
                }
            }

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
     * @param array $type Typ podkategorie
     * @param array $size Velkost topanok
     * @param array $price pole s 2 miestami zaciatocna cena a konecna cena
     * @param array $brand Znacka
     * @param int $first_row_id Riadok odkial mam hladat
     * @return array Vraciam pole produktov. Ak prazdne pole tak nastala chyba alebo produkt neexistuje
     */
    public static function get_products($amount, $type = [], $size = [], $price = [], $brand = [], $first_row_id = 0)
    {
        $conn = new mysqli(DB_server, DB_username, DB_password, DB_name);
        if ($conn->connect_error) {
            echo $conn->connect_error;
            return [];
        }
        $sql_str = "SELECT name, description, price, brand, image, size, type FROM products ";
        $where_start = false;
        if ($type != []) {
            $type_str = $type[0];
            for ($i = 1; $i < count($type); $i++) {
                $type_str .= "') OR (type ='" . $type[$i];
            }
            $sql_str .= "WHERE ((type='" . $type_str . "'))";
            $where_start = true;

        }
        if ($size != []) {
            $size_str = $size[0];
            for ($i = 1; $i < count($size); $i++) {
                $size_str .= "') OR (size ='" . $size[$i];
            }
            if (!$where_start) {
                $sql_str .= "WHERE ((size='" . $size_str . "'))";
                $where_start = true;
            } else {
                $sql_str .= " AND( (size = '" . $size_str . "'))";
            }
        }
        if ($price[0] != null || $price[1] != null) {
            if ($price[0] == null) {
                $price[0] = 0;
            }
            if ($price[1] == null) {
                $price[1] = 0;
            }

            if (!$where_start) {
                $sql_str .= "WHERE ((price > '" . $price[0] . "' AND price < '" . $price[1] . "'))";
                $where_start = true;
            } else {
                $sql_str .= " AND( (price > '" . $price[0] . "'AND price < '" . $price[1] . "'))";
            }
        }
        if ($brand != []) {
            $brand_str = $brand[0];
            for ($i = 1; $i < count($brand); $i++) {
                $brand_str .= "') OR (brand ='" . $brand[$i];
            }
            if (!$where_start) {
                $sql_str .= "WHERE(( brand ='" . $brand_str . "'))";
                $where_start = true;
            } else {
                $sql_str .= "AND( (brand ='" . $brand_str . "'))";
            }
        }
        $sql_str.=" LIMIT ".$first_row_id.", ".$amount;
        echo "<p style='color: #000;'>".$sql_str."</p>";
        if ($res = $conn->query($sql_str)) {
            $products = array();
            while ($row = $res->fetch_row()) {
                array_push($products, $row);
            }
            $conn->close();
            return $products;
        } else {
            echo "Error";
            $conn->close();
            return [];
        }

    }
}