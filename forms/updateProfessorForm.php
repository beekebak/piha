<?php
require_once '../utility/UtilityFunctions.php';

function writeUpdateProfessorForm($val){
    echo("изменить данные преподавателя" .
        getForm("../handlers/updateProfessorHandler.php") .
        getIdInput("professor", $val) .
        getInput("professor_name", "имя"));
    echo("<input type=\"submit\"></form>");
}
?>
