<html lang="rus">
<head>
    <meta charset="utf-8">
    <title>students</title>
</head>
<body>
    <p>Все студенты</p>
    <?php
        require_once "../utility/UtilityFunctions.php";
        $pdo = getPdo();
        writeInstancesOfEntity($pdo, "SELECT * FROM students", 'student');
    ?>
</body>
<a href="../forms/createStudentForm.php">Добавить студента</a>
<a href="../index.php">На главную</a>
</html>
