<?php
$data = $_POST;
if(!empty($data)) {
    require_once "../utility/UtilityFunctions.php";
    $data = $_POST;
    handleTrivialRequest($data,
        "INSERT INTO 
                  student_groups(group_name, faculty)
                  VALUES(:group_name, :faculty);",
        ["group_name", "faculty"]);
    header('Location: ../entities/groups.html');
}
?>