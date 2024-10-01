<?php
require_once "../utility/UtilityFunctions.php";
require_once "../forms/updateStudentForm.php";
$studentID = $_GET['student_id'];

function writeStudentData($pdo, $studentID){
    $Q = "SELECT student_id, student_name, birth_date, birth_place, phone_number, average_grade, group_id, group_name
      FROM students
      JOIN student_groups using(group_id)
      WHERE student_id='$studentID';";
    $values = ['id' => 'student_id', 'Имя' => 'student_name', 'Дата рождения' => 'birth_date', 'Место рождения' => 'birth_place',
        'Номер телефона' => 'phone_number', 'Средний балл' => 'average_grade'];
    echo '<table border="1">';
    $stmt = $pdo -> prepare($Q);
    $stmt -> execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    foreach ($values as $key => $value) {
        echo "<tr><td>$key: ${row[$value]}</tr></td>";
    }
    echo "<tr><td><a href=\"group.php?group_id=${row['group_id']}\">Группа: ${row['group_name']}<br></tr></td>";
    echo '</table>';
}
echo "<p>Листок студента</p><br>";

$pdo = getPdo();
writeStudentData($pdo, $studentID);

$Q = "SELECT elective_name, elective_id
      FROM students
      JOIN elective_records using(student_id)
      JOIN electives using(elective_id)
      WHERE students.student_id='$studentID';";
writeFacultiesOrStudents($pdo, $Q, 'student', $studentID, 'elective');

echo("Добавить факультатив");
$Q = "SELECT elective_name, elective_id FROM electives 
                                WHERE elective_id NOT IN (SELECT elective_id FROM elective_records WHERE student_id = $studentID)";
addFacultiesOrStudents($pdo, $Q, 'student', $studentID, 'elective');

writeUpdateStudentForm($studentID);
?>
<a href="../entities/students.php">К списку студентов</a>
<a href="../index.php">На главную</a>
