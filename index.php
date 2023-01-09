<?php
include_once "data/pdo.php";
include_once "dao/CarroDaoMySql.php";

if (isset($conn)) {
    $carroDao = new \dao\CarroDaoMySql($conn);
}

$carros = $carroDao->fetchAll();
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Crud Carro</title>
</head>
<body>
<div class="container container-fluid mt-3">
    <div class="row align-items-center">
        <div class="col">

            <h1>Insira um Carro</h1>
            <form action="process.php" method="post">
                <div class="mb-3">
                    <label for="marca" class="form-label">Marca do Carro:</label>
                    <input type="text" class="form-control" id="marca" aria-describedby="emailHelp" name="marca"
                           placeholder="Insira a Marca" spellcheck="true" autofocus>
                </div>
                <div class="mb-3">
                    <label for="km" class="form-label">Kilometragem:</label>
                    <input type="text" class="form-control" id="km" aria-describedby="emailHelp" name="km"
                           placeholder="Informe a Kilometragem do Veiculo" spellcheck="true">
                </div>
                <div class="mb-3">
                    <label for="cor" class="form-label">Cor do Carro:</label>
                    <input type="text" class="form-control" id="cor" aria-describedby="emailHelp" name="cor"
                           placeholder="Informe a cor do Carro" spellcheck="true" autofocus>
                </div>
                <button type="submit" class="btn btn-primary">Adicionar Carro</button>
            </form>

            <ul class="list-group mt-4">
                <?php foreach ($carros as $values): ?>
                    <li class="list-group-item"><span class="fw-bold fst-italic">Marca:</span> <?= $values->getMarca() ?> -
                        <span class="fw-bold fst-italic">Kilometragem:</span> <?= $values->getKm() ?> Km(s)
                        - <span class="fw-bold fst-italic">Cor:</span> <?= $values->getCor() ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

<script src="js/bootstrap.min.js">

</script>
</body>
</html>
