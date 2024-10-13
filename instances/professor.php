<?php
require_once "../forms/updateProfessorForm.php";
require_once "../utility/UtilityFunctions.php";
$professorID = $_GET['professor_id'];

echo "<p>Карточка преподавателя</p><br>";

function writeProfessorData($pdo, $professorID){
    $Query = "SELECT professor_id, professor_name, COUNT(elective_id) as electives_count
                    FROM professors
                    LEFT JOIN electives using(professor_id)
                    WHERE professor_id = ?
                    GROUP BY professor_id";
    $stmt = $pdo -> prepare($Query);
    $stmt -> execute([$professorID]);
    echo '<table border="1">';
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $values = ['id' => 'professor_id', 'Имя' => 'professor_name', 'Количество курируемых факультативов' => 'electives_count'];
    foreach ($values as $key => $value) {
        echo "<tr><td>$key: ${row[$value]}</tr></td>";
    }
    echo '</table>';
}

function writeElectives($pdo, $professorID){
    $Query = "SELECT elective_name, elective_id
                   FROM professors
                   JOIN electives using(professor_id)
                   WHERE professor_id=?;";
    $res = $pdo -> prepare($Query);
    $res -> execute([$professorID]);
    echo '<ul>';
    while ($row = $res->fetch()) {
        echo "<li><a href=\"elective.php?elective_id=${row['elective_id']}\">${row['elective_name']}</a>";
    }
    echo '</ul>';
}

$pdo = getPdo();
writeProfessorData($pdo, $professorID);
writeElectives($pdo, $professorID);

writeUpdateProfessorForm($professorID);
?>
<a href="../entities/professors.html">К списку преподавателей</a>
<a href="../index.php">На главную</a>
