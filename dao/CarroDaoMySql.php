<?php

namespace dao;

use model\Carro;

include_once "model/Carro.php";
include_once "ICarroDao.php";


class CarroDaoMySql implements \ICarroDao
{
    private $conn;

    public function __construct(\PDO $conn)
    {
        $this->conn = $conn;
    }

    public function insert(Carro $carro)
    {
        try {
            $stmt = $this->conn->prepare("INSERT INTO carros (marca, km, cor) VALUES (:marca, :km, :cor)");
            $stmt->bindValue(":marca", $carro->getMarca());
            $stmt->bindValue(":km", $carro->getKm());
            $stmt->bindValue(":cor", $carro->getCor());
            $stmt->execute();
        } catch (\PDOException $exception) {
            echo "Dados não inseridos no banco " . $exception->getMessage();
        }

    }

    public function fetchAll()
    {
        $carros = [];

        try {
            $stmt = $this->conn->query("SELECT * FROM carros");
            $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            foreach ($data as $items) {
                $carro = new Carro();
                $carro->setId($items['id']);
                $carro->setMarca($items['marca']);
                $carro->setKm($items['km']);
                $carro->setCor($items['cor']);

                $carros[] = $carro;
            }

            return $carros;

        } catch (\PDOException $exception) {
            echo "Dados não inseridos no banco " . $exception->getMessage();
        }
    }
}