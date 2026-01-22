<?php
try {
    $pdo = new PDO(
        "mysql:host=127.0.0.1;port=3306;dbname=bd_crud",
        "root",
        ""
    );
    echo "CONEXÃO OK";
} catch (PDOException $e) {
    echo "ERRO: " . $e->getMessage();
}
