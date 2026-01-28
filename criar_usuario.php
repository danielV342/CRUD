<?php

require("conexao.php");

$usuario = 'testep';
$senha_hash = password_hash("654321", PASSWORD_ARGON2I);

$sql = "INSERT INTO usuarios (usuario, senha) VALUES (:usuario, :senha)";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":usuario", $usuario);
$stmt->bindParam(":senha", $senha_hash);


if ($stmt->execute()) {
    echo "Usuario criado com sucesso";
} else {
    echo "Erro ao criar usuario";
}