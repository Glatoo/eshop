<?php
namespace MyLibrary;
use mysqli;
define('ROOT', dirname(__FILE__) . DIRECTORY_SEPARATOR);
include ROOT . "../../common/env.php";
/**
 * Hlavna trieda pre uzivatela
 *
 * @author     Branislav Hozza
 * @copyright  Branislav Hozza, All rights reserved.
 * @license    No License
 * @link       http://brano-shop.test
 */
class UserController
{
    /**
     * Funkcia pre prihlasenie
     *
     * @param string $name Pouzivatelove meno
     * @param string $password Heslo
     * @return int Vraciam status:
     *      1  Spravny vystup
     *      -1 Chybajuce data
     *      -2 Pripojenie zlyhalo
     *      -3 Uzivatel neexituje
     *      -4 Neplatne (prazdne udaje)
     *      -5 Zlyhalo pripravenie SQL
     */
    static function login($name, $password)
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

            return $stmt->num_rows > 0 ? 1 : -3;
        }
        $conn->close();
        return -5;
    }

    /**
     * Funkcia registruje noveho uzivatela
     * @param string $username Pouzivatelske meno
     * @param string $firstname Prve meno
     * @param string $surname Priezvisko
     * @param string $address Adresa
     * @param string $email Mail
     * @param string $password Heslo
     * @return int Vraciam status:
     *      1  Spravny vystup
     *      -1 Chybajuce data
     *      -2 Neplatne (prazdne udaje)
     *      -3 Pripojenie zlyhalo
     *      -4 Uzivatel existuje alebo email sa pouziva
     *      -5 Zlyhalo pripravenie SQL pri ziskani uzivatelov
     *      -6 Zlyhalo pripravenie SQL pri vlozeni uzivatela
     */
    static function register($username, $firstname, $surname, $address, $email, $password)
    {
        if (!isset($username) || !isset($firstname) || !isset($surname) || !isset($address) || !isset($email) || !isset($password)) {
            return -1; // Chybajuce data
        }
        if (strlen($username) == 0 || strlen($firstname) == 0 || strlen($surname) == 0 || strlen($address) == 0 || strlen($email) == 0 || strlen($password) < 8) {
            echo json_encode($_POST);
            return -2; //Neplatne(prazdne) udaje
        }
        $conn = new mysqli(DB_server, DB_username, DB_password, DB_name);
        if ($conn->connect_error) {
            echo $conn->connect_error;
            return -3;//Zlyhalo pripojenie na DB
        }
        if ($stmt = $conn->prepare('SELECT * FROM users WHERE username=? OR email=?')) {

            $stmt->bind_param("ss", $username, $email);

            $stmt->execute();

            $result = $stmt->get_result();

            $stmt->close();
            if ($stmt->num_rows > 0) {
                $conn->close();
                return -4; //Uzivatel je zaregistrovany alebo email sa pouziva
            } else {
                if ($stmt = $conn->prepare("INSERT INTO users (username, firstname, lastname, address, email, pass) VALUES (?, ?, ?, ?, ?, ?)")) {
                    $stmt->bind_param("ssssss", $username, $firstname, $surname, $address, $email, $password);

                    $stmt->execute();

                    $stmt->close();
                    $conn->close();
                    return 1;
                } else {
                    echo $conn->error;
                    echo $stmt->error;
                    return -6; //Zlyhalo pripravenie SQL pri vlozeni osoby
                }
            }
        } else {
            $conn->close();
            return -5;//Zlyhalo pripravenie SQL pri ziskani osoby
        }
    }
}