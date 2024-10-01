<?php
    $pdo = new PDO("mysql:host=localhost", "root", "root");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec(file_get_contents('dbinit.sql'));
    header('Location: index.php');
?>