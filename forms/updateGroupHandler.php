<?php
require_once "../utility/UtilityFunctions.php";
$data = $_POST;
if (!empty($data)) {
    updateValues($data, 'group', 'student_groups');
    header("Location: ../instances/group.php?group_id=$data[group_id]");
}
?>