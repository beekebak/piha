<?php
    require_once "../utility/UtilityFunctions.php";
    echo(getForm("../forms/createGroupHandler.php").
        getRequiredInput("group_name", "название группы").
        getRequiredInput("faculty", "факультет"));
    echo("<input type=\"submit\"><form>");
?>
<a href="../entities/groups.php">К списку групп</a>
