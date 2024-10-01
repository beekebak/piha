<?php
require_once '../utility/UtilityFunctions.php';

function writeUpdateElectiveForm($val){
    echo("изменить данные факультатива" .
        getForm("../forms/updateElectiveHandler.php") .
        getIdInput("elective", $val) .
        getInput("elective_name", "название факультатива"));
    echo("<input type=\"submit\"></form>");
}
?>