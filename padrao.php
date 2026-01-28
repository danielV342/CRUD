<?php


session_start();

if ($_SESSION['tipo_usuario'] !== 'padrao') {
    header("Location: login.php");
    exit;
}

require('conexao.php');

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
<main>
<button class="btn btn-primary m-2" id="toggleMenu">☰</button>

<div class="d-flex">
    <nav id="sidebar" class="bg-dark text-white p-3" style="width:250px; min-height:100vh;">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-white" href="registrar.php">Abrir sala</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#">Fechar sala</a>
            </li>
        </ul>
    </nav>

    <div class="flex-fill p-4">
        Conteúdo
    </div>
</div>

    
    </main>
    <script>
document.getElementById("toggleMenu").addEventListener("click", function () {
    const sidebar = document.getElementById("sidebar");
    sidebar.classList.toggle("d-none");
});
</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>