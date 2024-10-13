<?php
require_once "../utility/UtilityFunctions.php";
$data = $_POST;
if (!empty($data)) {
    updateValues($data, 'professor', 'professors');
    header("Location: ../instances/professor.php?professor_id=$data[professor_id]");
}
?>