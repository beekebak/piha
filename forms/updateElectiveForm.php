<?php
require_once '../utility/UtilityFunctions.php';

function writeUpdateElectiveForm($val){
    echo("изменить данные факультатива" .
        getForm("../handlers/updateElectiveHandler.php") .
        getIdInput("elective", $val) .
        getInput("elective_name", "название факультатива"));
    $pdo = getPdo();
    writeSelect($pdo, "SELECT professor_name, professor_id FROM professors", "professor", "professor_id");
    echo("<input type=\"submit\"></form>");
}
?>