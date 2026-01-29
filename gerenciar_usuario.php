<?php

session_start();

if ($_SESSION['tipo_usuario'] !== 'admin') {
    header("Location: login.php");
    exit;
}
require('conexao.php');

$sql = "SELECT * FROM `usuarios`";
$statement = $pdo->query($sql);
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>

  <body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Registro das salas</a>
                <span class="navbar-text text-white me-3">
                    Olá, <?= $_SESSION['nome_usuario'] ?>
                </span>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="menuNavbar">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link " href="restrita.php">Visualizar relatórios</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="#">Gerenciar usuários</a>
                        </li>

                <!-- <li class="nav-item"> 
                    <a class="nav-link" href="#">Relatórios</a>
                </li>-->
                    </ul>

                    <a href="logout.php" class="btn btn-outline-light">Sair</a>
                </div>
            </div>
        </nav>
    </header>
    <main class="container">

    <hr>
    <table class="table table-striped">

    <thead>
        <tr>
            <th style="width: 80%;">Usuário</th>
            <th>Opcões</th>
        </tr>
    </thead>

    <tbody>
        <?php
        foreach ($result as $row): ?>
        <tr>
            <td><?= $row['nome'] ?></td>

            <td class="d-flex justify-content-end gap-2">
              <a class="btn btn-sm btn-primary" href="visualizar.php?id=<?= $row['id'] ?>">Ver</a>
              <a class="btn btn-sm btn-warning" href="editar.php?id=<?= $row['id'] ?>">Editar</a>
              <a class="btn btn-sm btn-danger" href="excluir.php?id=<?= $row['id'] ?>">Excluir</a>
            </td>
          </tr>
          <?php endforeach ?>
        </tbody>
      </table>

      
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>