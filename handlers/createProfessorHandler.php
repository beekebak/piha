<?php
$data = $_POST;
if(!empty($data)) {
    require_once "../utility/UtilityFunctions.php";
    $data = $_POST;
    handleTrivialRequest($data,
        "INSERT INTO 
                  professors(professor_name)
                  VALUES(:professor_name);",
        ["professor_name"]);
    header('Location: ../entities/professors.html');
}
?>