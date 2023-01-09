<?php

$user = "root";
$pass = "";
$dbname = "carrodb";
$servername = "localhost";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Banco conectado com sucesso";
} catch (PDOException $exception) {
    echo "Falha na conexão" . $exception->getMessage();
}