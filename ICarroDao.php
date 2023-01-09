<?php

use model\Carro;

interface ICarroDao {
    public function insert(Carro $carro);

    public function fetchAll();
}


