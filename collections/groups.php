<html lang="rus">
<head>
    <meta charset="utf-8">
    <title>students</title>
</head>
<body>
    <p>Все группы</p>
    <?php
        require_once "../utility/UtilityFunctions.php";
        $pdo = getPdo();
        writeInstancesOfEntity($pdo, "SELECT * FROM student_groups", 'group');
    ?>
</body>
<a href="../forms/createGroupForm.php">Добавить группу</a>
<a href="../index.php">На главную</a>
</html>