<html lang="rus">
<head>
    <meta charset="utf-8">
    <title>students</title>
</head>
<body>
    <p>Все факультативы</p>
    <?php
        require_once "../utility/UtilityFunctions.php";
        $pdo = getPdo();
        writeInstancesOfEntity($pdo, "SELECT * FROM electives", 'elective');
    ?>
</body>
<a href="../forms/createElectiveForm.php">Добавить факультатив</a>
<a href="../index.php">На главную</a>
</html>