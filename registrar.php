<?php

session_start();

require 'conexao.php';

$usuario = $_SESSION['usuario_id'];

$sql = "SELECT numero, aberta FROM salas ORDER BY numero";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$salas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
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
                                <a class="nav-link active" href="registrarAbertura.php">Registrar</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="meusRegistros.php">Meus registros</a>
                            </li>

                            
                        </ul>
                    <span class="navbar-text text-white me-3">
                        Olá, <?= $_SESSION['nome_usuario'] ?>
                    </span>
                    <a href="logout.php" class="btn btn-outline-light">Sair</a>
                    
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="container mt-4">
            <div class="row g-3">

                <?php foreach ($salas as $sala): ?>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">

                        <div class="card text-center
                            <?= $sala['aberta'] ? 'border-success' : 'border-danger' ?>">

                            <div class="card-header fw-bold">
                                Sala <?= htmlspecialchars($sala['numero']) ?>
                            </div>

                            <div class="card-body">
                                <p class="card-text">
                                    Status:
                                    <strong class="<?= $sala['aberta'] ? 'text-success' : 'text-danger' ?>">
                                        <?= $sala['aberta'] ? 'Aberta' : 'Fechada' ?>
                                    </strong>
                                </p>

                                <?php if ($sala['aberta']): ?>
                                    <!-- FECHAR -->
                                    <form method="post" action="fechamento.php">
                                        <input type="hidden" name="numero" value="<?= $sala['numero'] ?>">
                                        <button class="btn btn-danger btn-sm">
                                            Fechar sala
                                        </button>
                                    </form>
                                <?php else: ?>
                                    <!-- ABRIR -->
                                    <form method="post" action="abertura.php">
                                        <input type="hidden" name="numero" value="<?= $sala['numero'] ?>">
                                        <button class="btn btn-success btn-sm">
                                            Abrir sala
                                        </button>
                                    </form>
                                <?php endif; ?>
                            </div>

                        </div>

                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>ml