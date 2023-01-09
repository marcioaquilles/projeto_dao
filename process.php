<?php

include_once "data/pdo.php";
include_once "dao/CarroDaoMySql.php";

if (isset($conn)) {
    $carroDao = new \dao\CarroDaoMySql($conn);
}
$carro = new \model\Carro();

$marca = filter_input(INPUT_POST, 'marca');
$km = filter_input(INPUT_POST, 'km');
$cor = filter_input(INPUT_POST, 'cor');

$carro->setMarca($marca);
$carro->setKm($km);
$carro->setCor($cor);

$carroDao->insert($carro);

header("location: index.php");



