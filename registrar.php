<?php

session_start();

if ($_SESSION['tipo_usuario'] !== 'padrao') {
    header("Location: index.php");
    exit;
}

require 'scripts/conexao.php';

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
    <title>Registrar</title>
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
                    <a href="scripts/logout.php" class="btn btn-outline-light">Sair</a>
                    
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="container mt-4">
            <div class="row">

                <?php foreach ($salas as $sala): ?>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">

                        <div class="card text-center w-100 h-100
                        <?= $sala['aberta'] ? 'border-success' : 'border-danger' ?>">

                        <div class="card-header fw-bold">
                        Sala <?= htmlspecialchars($sala['numero']) ?>
                        </div>

                        <div class="card-body" >

                        <p>
                            Status:
                            <strong class="<?= $sala['aberta'] ? 'text-success' : 'text-danger' ?>">
                            <?= $sala['aberta'] ? 'Aberta' : 'Fechada' ?>
                            </strong>
                        </p>

                        <?php if ($sala['aberta']): ?>

                            <form method="post" action="scripts/fechamento.php">
                            <input type="hidden" name="numero" value="<?= $sala['numero'] ?>">
                            <button class="btn btn-danger btn-lg">
                                Fechar sala
                            </button>
                           <br>
                            <br>
                             <div class="collapse" id="det<?= $sala['numero'] ?>">
                        <div class="card-body border-top">
                            <input class="form-control" type="text" placeholder="Observações"name="observacoes" id="observacoes">
                        </div>
                        </div>
                         </form>
                            <button
                            class="btn btn-sm btn-link w-100"
                            data-bs-toggle="collapse"
                            data-bs-target="#det<?= $sala['numero'] ?>"
                            >
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-caret-down" viewBox="0 0 16 16">
                    <path d="M3.204 5h9.592L8 10.481zm-.753.659 4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659"/>
                    </svg>
                            </button>

                        <?php else: ?>

                            <form method="post" action="scripts/abertura.php">
                            <input type="hidden" name="numero" value="<?= $sala['numero'] ?>">
                            <button class="btn btn-success btn-lg">
                                Abrir sala
                            </button>
                            </form>

                        <?php endif; ?>

                        </div> <!-- card-body -->

                        <!-- COLLAPSE DENTRO DO CARD -->
                       

                    </div> <!-- card -->

                    </div>

                <?php endforeach; ?>

            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>