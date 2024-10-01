<?php
$data = $_POST;
if(!empty($data)) {
    require_once "../utility/UtilityFunctions.php";
    $data = $_POST;
    handleTrivialRequest($data,
        "INSERT INTO 
                  electives(elective_name)
                  VALUES(:elective_name);",
        ["elective_name"]);
    header('Location: ../entities/electives.php');
}
?>