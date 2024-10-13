<?php
    require_once "../utility/UtilityFunctions.php";
    require_once "../forms/updateElectiveForm.php";
    $electiveID = $_GET['elective_id'];

    $pdo = getPdo();
    $Q = "SELECT elective_name, professor_id, professor_name FROM electives LEFT JOIN professors using(professor_id) WHERE elective_id = $electiveID";
    $name = $pdo->query($Q)->fetch(PDO::FETCH_ASSOC);
    echo "<tr><td>${name['elective_name']}</td></tr><br>";
    if(!is_null($name['professor_name'])){
        echo "<tr><td><a href=\"professor.php?professor_id=${name['professor_id']}\">Профессор: ${name['professor_name']}<br></tr></td>";
    } else {
        echo "<tr><td>Преподаватель: ${name['professor_name']}<br></tr></td>";
    }

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
<a href="../entities/electives.html">К списку факультативов</a>
<a href="../index.php">На главную</a>
