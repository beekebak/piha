<?php
require_once '../utility/UtilityFunctions.php';

function writeUpdateGroupForm($val){
    echo("изменить данные группы" .
        getForm("../forms/updateGroupHandler.php") .
        getIdInput("group", $val) .
        getInput("group_name", "название") .
        getInput("faculty", "факультет"));
    $pdo = getPdo();
    writeSelect($pdo, "SELECT student_name, student_id FROM students WHERE group_id = $val", "student", "leader_id");
    echo("<input type=\"submit\"></form>");
}
?>