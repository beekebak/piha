<?php
    require_once "../utility/UtilityFunctions.php";
    require_once "../forms/updateElectiveForm.php";
    $electiveID = $_GET['elective_id'];

    $pdo = getPdo();
    $Q = "SELECT elective_name FROM electives WHERE elective_id = $electiveID";
    $name = $pdo->query($Q)->fetch(PDO::FETCH_ASSOC);
    echo "<tr><td>${name['elective_name']}</td></tr>";

    $Q = "SELECT student_name, student_id, elective_id
          FROM electives
          JOIN elective_records using(elective_id)
          JOIN students using(student_id)
          WHERE electives.elective_id='$electiveID';";
    writeFacultiesOrStudents($pdo, $Q, 'elective', $electiveID, 'student');

    echo("Добавить студентов");
    $Q = "SELECT student_name, student_id FROM students 
                                    WHERE student_id NOT IN (SELECT student_id FROM elective_records WHERE elective_id = $electiveID)";
addFacultiesOrStudents($pdo, $Q, 'elective', $electiveID, 'student');

writeUpdateElectiveForm($electiveID);
?>
<a href="../entities/electives.php">К списку факультативов</a>
<a href="../index.php">На главную</a>
