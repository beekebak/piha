<?php
    require_once "../utility/UtilityFunctions.php";
    $data = $_POST;
    handleTrivialRequest($data,
        "DELETE FROM elective_records WHERE elective_id = :elective_id AND student_id = :student_id",
               ["elective_id", "student_id"]);
    redirectToMaker($data);
?>