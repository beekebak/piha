<?php
    $data = $_POST;
    if(!empty($data)) {
        require_once "../utility/UtilityFunctions.php";
        $data = $_POST;
        handleTrivialRequest($data,
            "INSERT INTO 
                  students(student_name, birth_place, birth_date, phone_number, average_grade, group_id)
                  VALUES(:student_name, :birth_place, :birth_date, :phone_number, :average_grade, :group_id);",
            ["student_name", "birth_place", "birth_date", "phone_number", "average_grade", "group_id"]);
        header('Location: ../entities/students.html');
    }
?>

