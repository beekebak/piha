<?php
require_once "../utility/UtilityFunctions.php";
echo(getForm("../handlers/createProfessorHandler.php").
    getRequiredInput("professor_name", "имя"));
echo("<input type=\"submit\"><form>");
?>
    <a href="../entities/professors.html">К списку преподавателей</a><?php
