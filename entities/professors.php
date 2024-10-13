<?php
require_once "../utility/UtilityFunctions.php";
header('Content-Type: application/json');

$pdo = getPdo();
$query = $pdo->query("SELECT professor_id, professor_name, COUNT(elective_id) as electives_count
                    FROM professors
                    LEFT JOIN electives using(professor_id)
                    GROUP BY professor_id");
$groups = $query->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($groups);
?>