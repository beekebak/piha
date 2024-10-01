<?php
require_once "../utility/UtilityFunctions.php";
$data = $_POST;
if (!empty($data)) {
    updateValues($data, 'student', 'students');
    header("Location: ../entities/student.php?student_id=$data[student_id]");
}
?>