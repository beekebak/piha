<?php
    require_once "../utility/UtilityFunctions.php";
    echo(getForm("../handlers/createGroupHandler.php").
        getRequiredInput("group_name", "название группы").
        getRequiredInput("faculty", "факультет"));
    echo("<input type=\"submit\"><form>");
?>
<a href="../entities/groups.html">К списку групп</a>
