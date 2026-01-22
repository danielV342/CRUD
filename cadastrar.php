<?php

require('conexao.php');

$nome = filter_input(type: INPUT_POST, var_name: 'nome', filter: FILTER_DEFAULT);
$sobrenome = filter_input(type: INPUT_POST, var_name: 'sobrenome', filter: FILTER_DEFAULT);
$dia = filter_input(type: INPUT_POST, var_name: 'dia', filter: FILTER_DEFAULT);

try{
    $sql = "INSERT INTO `registros` (nome, sobrenome, dia) VALUES ('$nome', '$sobrenome', '$dia')";
    $statement = $pdo->query(query: $sql);
} catch(PDOException $e) {
    echo "". $e->getMessage();
    exit();
    }