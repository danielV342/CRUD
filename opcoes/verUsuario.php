<?php

session_start();

if ($_SESSION['tipo_usuario'] !== 'admin') {
    header('Location: login.php');
    exit(); 
}

$usuario = $_SESSION['nome_usuario'];

require('../conexao.php');

$sql = "SELECT * FROM `registros` WHERE usuario = '$usuario'";
$statement = $pdo->query($sql);
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Registro das salas</a>
            
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menuNavbar">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Visualizar relatórios</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="gerenciar_usuario.php">Gerenciar usuários</a>
                </li>

                <!-- <li class="nav-item"> 
                    <a class="nav-link" href="#">Relatórios</a>
                </li>-->
            </ul>


            <span class="navbar-text text-white me-3">
                Olá, <?= $_SESSION['nome_usuario'] ?>
            </span>
            <a href="../logout.php" class="btn btn-outline-light">Sair</a>
        </div>
    </div>
</nav>
    </header>
    <main>
    <table class="table table-striped">
        <thead>
            <th>Sala</th>
            <th>Nome</th>
            <th>Data e hora</th>
            <th>Ação</th>
        </thead>
        <tbody>
            <?php
            foreach ($result as $row): ?>
            <tr>
                <td><?= $row['numero'] ?></td>
                <td><?= $row['usuario'] ?></td>
                <td><?= $row['data'] ?></td>
                <td><?= $row['acao'] ?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
      </table>
      </main>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>

