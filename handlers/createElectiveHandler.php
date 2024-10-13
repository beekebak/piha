<?php
$data = $_POST;
if(!empty($data)) {
    require_once "../utility/UtilityFunctions.php";
    $data = $_POST;
    handleTrivialRequest($data,
        "INSERT INTO 
                  electives(elective_name, professor_id)
                  VALUES(:elective_name, :professor_id);",
        ["elective_name", "professor_id"]);
    header('Location: ../entities/electives.html');
}
?>