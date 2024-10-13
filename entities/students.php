<?php
require_once "../utility/UtilityFunctions.php";
header('Content-Type: application/json');

$pdo = getPdo();
$query = $pdo->query("SELECT * FROM students");
$students = $query->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($students);
?>