<?php
    require_once "../utility/UtilityFunctions.php";
    echo(getForm("../forms/createGroupHandler.php").
        getRequiredInput("group_name", "название группы").
        getRequiredInput("faculty", "факультет"));
    echo("<input type=\"submit\"><form>");
?>
<a href="../collections/groups.php">К списку групп</a>
