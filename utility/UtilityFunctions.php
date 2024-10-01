<?php
function getPdo(){
    return new PDO("mysql:host=localhost;dbname=g3kovalev;charset=utf8", 'root', 'root');
}

function writeInstancesOfEntity($pdo, $query, $name){
    $res = $pdo->prepare($query);
    $res->execute();
    echo "<table border='1'>";
    while ($row = $res->fetch()) {
        $id = $name.'_id';
        echo "<tr><td><a href=\"../instances/$name.php?$id=${row[$name.'_id']}\">${row[$name.'_name']}</a></td></tr>";
    }
    echo "</table>";
}

function writeSelect($pdo, $query, $name, $param_name){
    $id = $name.'_id';
    $big_name = $name.'_name';
    echo("<select name=$param_name>");
    $groups = $pdo->query($query);
    while ($row = $groups->fetch()) {
        echo("<option value=$row[$id]> $row[$big_name] </option>");
    }
    echo("<option value=\"\"> none </option>");
    echo("</select>");
}

function writeFacultiesOrStudents($pdo, $query, $main_name, $id_val, $writeable_name){
    $main_id = $main_name.'_id';
    $writeable_id = $writeable_name.'_id';
    $writeable_fullname = $writeable_name.'_name';
    $stmt = $pdo -> prepare($query);
    $stmt -> execute();
    echo '<ul>';
    while ($row = $stmt->fetch()) {
        echo "<li><a href=\"$writeable_name.php?$writeable_id=${row[$writeable_id]}\">${row[$writeable_fullname]}</a>
           <form action=\"../forms/deleteElectiveHandler.php\" method=\"post\">
                <input hidden name=$writeable_id value=${row[$writeable_id]}>
                <input hidden name=$main_id value=$id_val>
                <input hidden name=source value=$main_name>
                <input type=\"submit\" value=Удалить>
           </form>";
    }
    echo '</ul>';
}

function addFacultiesOrStudents($pdo, $query, $main_name, $id_val, $writeable_name){
    $main_id = $main_name.'_id';
    $writeable_id = $writeable_name.'_id';
    $writeable_fullname = $writeable_name.'_name';
    echo("<form action=\"../forms/addElectiveHandler.php\" method=\"post\">
      <select required name=$writeable_id>");
    $electives = $pdo->query($query);
    while ($row = $electives->fetch()) {
        echo("<option value=$row[$writeable_id]> $row[$writeable_fullname] </option>");
    }
    echo("</select>
    <input hidden name=$main_id value=$id_val>
    <input hidden name=source value=$main_name>
    <input type=\"submit\">
</form>");
}

function getInput($name, $text){
    return "<label><input name=\"$name\">$text</label><br>";
}

function getRequiredInput($name, $text){
    return "<label><input required name=\"$name\">$text</label><br>";
}

function getForm($path){
    return "<form action=\"$path\" method=\"POST\">";
}

function getIdInput($name, $val){
    $id = $name.'_id';
    return "<label><input readonly type=\"hidden\" name=\"$id\" value=\"$val\">";
}

function redirectToMaker($data){
    $src = $data['source'].'_id';
    header("Location: ../instances/$data[source].php?$src=$data[$src]");
}

function handleTrivialRequest($data, $query, $query_args_names){
    $query_args = [];
    foreach ($query_args_names as $name) {
        $query_args[$name] = $data[$name] !== "" ? $data[$name] : null;
    }
    $pdo = getPdo();
    $statement = $pdo->prepare($query);
    $statement->execute($query_args);
}

function updateValues($data, $name, $plural){
    $id = $name.'_id';
    $keys = [];
    $vals = [];
    foreach ($data as $key => $value) {
        if (!empty($value) and $key != $id) {
            $keys[] = "$key = :$key";
            $vals[":$key"] = $value;
        }
    }
    if (!empty($vals)) {
        $PDO = getPdo();
        $result = $PDO->prepare("UPDATE $plural SET " . implode(", ", $keys) . " WHERE $id = " . $data[$id]);
        $result->execute($vals);
    }
}

?>