<?php

$servidor = "localhost";
$db = "crud2_php";
$username = "root";
$password = "";

try {
    $conexion=new PDO("mysql:host=$servidor;dbname=$db", $username, $password);
    
} catch (Exception $e) {
    echo $e->getMessage();
}

?>