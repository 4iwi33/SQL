<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: yellowgreen;
        }
      
        table tr td {
            padding: 10px;
            color: white;
            background-color: orange;
        }

        table {
            border: 3px solid green;
        }
    </style>
</head>

<body>
 

    <?php

    //https://github.com/zayceva-nastya/Heroku

    /// Username: BfhbD1H6nh

// Database name: BfhbD1H6nh

// Password: rowI2pAKLv

// Server: remotemysql.com

// Port: 3306

    $link = mysqli_connect(
        "remotemysql.com",
        "BfhbD1H6nh",
        "rowI2pAKLv"
    )
        or die("не удалось подключиться");

    mysqli_select_db(
        $link,
        "BfhbD1H6nh"
    )
        or die("Не удалось выбрать БД");

    $result = mysqli_query(
        $link,
        "Select * From test"
    ) or die("Не удалось выполнить запрос");

    echo "<center><table border='2'>\n";

    while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
        echo "<tr>";
        echo "<td>" . $row[0] . "</td>";
        echo "<td>" . $row[1] . "</td>";
        echo "<td>" . $row[2] . "</td>";
        echo "</tr>";
    }
    echo "</table></center>\n";

    mysqli_free_result($result);

    mysqli_close($link);

    ?>
</body>

</html>