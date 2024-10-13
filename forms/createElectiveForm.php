<?php
require_once "../utility/UtilityFunctions.php";
echo(getForm("../handlers/createElectiveHandler.php").
    getRequiredInput("elective_name", "название факультатива"));
    writeSelect(getPdo(), "SELECT professor_id, professor_name FROM professors", "professor", "professor_id");
echo("<input type=\"submit\"><form>");
?>
<a href="../entities/electives.html">К списку факультативов</a>
