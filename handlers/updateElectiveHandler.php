<?php
require_once "../utility/UtilityFunctions.php";
$data = $_POST;
if (!empty($data)) {
    updateValues($data, 'elective', 'electives');
    header("Location: ../instances/elective.php?elective_id=$data[elective_id]");
}
?>