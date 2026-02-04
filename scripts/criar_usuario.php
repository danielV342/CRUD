<?php

session_start();

if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] !== 'admin') {
    header("Location: login.php");
    exit;
}

require("conexao.php");

$nome    = filter_input(INPUT_POST, 'nome');
$usuario = filter_input(INPUT_POST, 'usuario');
$senha   = filter_input(INPUT_POST, 'senha');
$tipo    = filter_input(INPUT_POST, 'tipo');

$senha_hash = password_hash($senha, PASSWORD_ARGON2I);

$sql = "INSERT INTO usuarios (nome, usuario, senha, tipo) 
        VALUES (:nome, :usuario, :senha, :tipo)";

$stmt = $pdo->prepare($sql);

$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':usuario', $usuario);
$stmt->bindParam(':senha', $senha_hash);
$stmt->bindParam(':tipo', $tipo);

if ($stmt->execute()) {
    echo "Usuário criado com sucesso";
    header("Location: ../gerenciarUsuario.php");
} else {
    echo "Erro ao criar usuário";
}
