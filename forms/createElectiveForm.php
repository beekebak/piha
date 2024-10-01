<?php
require_once "../utility/UtilityFunctions.php";
echo(getForm("../forms/createElectiveHandler.php").
    getRequiredInput("elective_name", "название факультатива"));
echo("<input type=\"submit\"><form>");
?>
<a href="../collections/electives.php">К списку факультативов</a>
