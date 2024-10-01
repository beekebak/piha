<?php
    require_once "../utility/UtilityFunctions.php";
    echo(getForm("../forms/createStudentHandler.php").
        getRequiredInput("student_name", "имя").
        getInput("birth_place", "место рождения").
        getInput("birth_date", "время рождения").
        getInput("phone_number", "номер телефона").
        getInput("average_grade", "средний балл"));
        $PDO = getPdo();
        writeSelect($PDO, "SELECT group_name, group_id FROM student_groups", "group", "group_id");
        echo("<input type=\"submit\"></form>");
?>
<a href="../collections/students.php">К списку студентов</a>
