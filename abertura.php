<?php
session_start();
require('conexao.php');

date_default_timezone_set('America/Sao_Paulo');
$dataHora = date('Y-m-d H:i:s');

$usuario_id = $_SESSION['nome_usuario'];
$usuario_login = $_SESSION['usuario_login'];

$numero = filter_input(type: INPUT_POST, var_name: 'numero', filter: FILTER_DEFAULT);
// $sobrenome = filter_input(type: INPUT_POST, var_name: 'sobrenome', filter: FILTER_DEFAULT);
// $dia = filter_input(type: INPUT_POST, var_name: 'dia', filter: FILTER_DEFAULT);

try{
    $sql = "INSERT INTO `registros` (numero, data, usuario, acao, usuario_login) VALUES ('$numero', '$dataHora', '$usuario_id', 'Abriu', '$usuario_login')";
    $statement = $pdo->query(query: $sql);
} catch(PDOException $e) {
    echo "". $e->getMessage();
    exit();
    }



try {
    $sql1 = "UPDATE salas SET aberta = 1 WHERE numero = '$numero'";
    $statement1 = $pdo->query(query: $sql1);

} catch(PDOException $e) {
    echo "". $e->getMessage();
    exit();
    }

header("Location: registrar.php");