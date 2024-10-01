<?php
    require_once "../utility/UtilityFunctions.php";
    $data = $_POST;
    if(!empty($data)) {
        handleTrivialRequest($data,
            "INSERT INTO 
                      elective_records(student_id, elective_id)
                      VALUES(:student_id, :elective_id);",
            ["student_id", "elective_id"]);
        redirectToMaker($data);
    }
?>