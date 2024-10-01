<?php
require_once "../forms/updateGroupForm.php";
require_once "../utility/UtilityFunctions.php";
$groupID = $_GET['group_id'];

function writeGroupData($pdo, $groupID){
    $Query = "SELECT group_id, group_name, faculty, leader_id
      FROM student_groups
      WHERE group_id='$groupID';";
    $stmt = $pdo -> prepare($Query);
    $stmt -> execute();
    echo '<table border="1">';
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $values = ['id' => 'group_id', 'Название группы' => 'group_name', 'Факультет' => 'faculty'];
    foreach ($values as $key => $value) {
        echo "<tr><td>$key: ${row[$value]}</tr></td>";
    }
    echo "<tr><td><a href=\"student.php?student_id=${row['leader_id']}\">id старосты: ${row['leader_id']}</a> <br></tr></td>";
    echo '</table>';
}

function writeStudents($pdo, $groupID){
    $Students_query = "SELECT student_name, student_id
                   FROM student_groups
                   JOIN students using(group_id)
                   WHERE group_id='$groupID'";
    $res = $pdo -> prepare($Students_query);
    $res -> execute();
    echo '<ul>';
    while ($row = $res->fetch()) {
        echo "<li><a href=\"student.php?student_id=${row['student_id']}\">${row['student_name']}</a>";
    }
    echo '</ul>';
}

echo "<p>Список студентов группы</p><br>";

$pdo = getPdo();
writeGroupData($pdo, $groupID);
writeStudents($pdo, $groupID);


writeUpdateGroupForm($groupID);
?>
<a href="../collections/groups.php">К списку групп</a>
<a href="../index.php">На главную</a>
