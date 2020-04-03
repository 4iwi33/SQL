<?php
$link = mysqli_connect("remotemysql.com", "BfhbD1H6nh", "rowI2pAKLv", "BfhbD1H6nh")
    or die("Не удалось соединиться с сервером");

if (!empty($_POST['text'] && !empty($_POST['name']))) {
    mysqli_query(
        $link,
        "INSERT INTO fk5 VALUES(NULL, '$_POST[text]', '$_POST[name]')"
    );
    header('Location: index.php');
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // Username: BfhbD1H6nh

    // Database name: BfhbD1H6nh

    // Password: rowI2pAKLv

    // Server: remotemysql.com

    // Port: 3306

    // mysqli_query("SET NAMES 'cp1251'");

    $query = "SELECT * FROM fk5";
    $result = mysqli_query($link, $query)
        or die("Не удалось выполнить запрос");

    echo "<table border='1'>\n";
    while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
        echo "<tr>";
        echo "<td>" . $row[0] . "</td>";
        echo "<td>" . $row[1] . "</td>";
        echo "<td>" . $row[2] . "</td>";
        echo "</tr>";
    }

    echo  "</table>\n";

    mysqli_free_result($result);
    mysqli_close($link);
    ?>

    <form action="index.php" method="POST">
        <textarea name="text" cols="30" rows="10"></textarea>
        <input type="text" name="name">
        <input type="submit" value="ok">
    </form>
</body>

</html>