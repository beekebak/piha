<?php
require_once '../utility/UtilityFunctions.php';

function writeUpdateStudentForm($val){
    echo("изменить данные студента" .
        getForm("../handlers/updateStudentHandler.php") .
        getIdInput("student", $val) .
        getInput("student_name", "имя") .
        getInput("birth_place", "место рождения") .
        getInput("birth_date", "время рождения") .
        getInput("phone_number", "номер телефона") .
        getInput("average_grade", "средний балл"));
    $pdo = getPdo();
    writeSelect($pdo, "SELECT group_name, group_id FROM student_groups", "group", "group_id");
    echo("<input type=\"submit\"></form>");
}
?>