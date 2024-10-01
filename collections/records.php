<html lang="rus">
<head>
    <meta charset="utf-8">
    <title>students</title>
</head>
<body>
    <p>Все записи</p>
    <?php
        $host = 'localhost';
        $db = 'g3kovalev';
        $user = 'root';
        $pass = 'root';
        $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
        $res = $pdo->prepare("SELECT student_name, elective_name, elective_records.student_id, elective_records.elective_id
                                    FROM elective_records
                                    JOIN students ON elective_records.student_id = students.student_id
                                    JOIN electives ON elective_records.elective_id = electives.elective_id");
        $res->execute();
        echo "<table border='1'>";
        while ($row = $res->fetch()) {
            echo "<tr><td><a href=\"../entities/elective.php?elective_id=${row['elective_id']}\">${row['elective_name']}</a></td>
                  <td><a href=\"../entities/student.php?student_id=${row['student_id']}\">${row['student_name']}</a></td></tr>";
        }
        echo "</table>";
    ?>
</body>
<a href="../index.php">На главную</a>
</html>