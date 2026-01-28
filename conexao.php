<?php
try {
    $pdo = new PDO(
        "mysql:host=localhost;port=3306;dbname=bd_crud;charset=utf8mb4",
        "root",
        ""
    );
    } catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
    }
