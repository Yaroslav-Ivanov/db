<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

// Username: TkuGE0xpdU

// Database name: TkuGE0xpdU

// Password: xc1L3xMG1m

// Server: remotemysql.com

// Port: 3306

    include('conect.php');
    include('smile.php');
  

    $result = $mysqli->query('SELECT * FROM `tabl`');

    while ($row = $result->fetch_object()) {
        echo "<b>". smile($row->text)."</b> <i>$row->name</i></br>";
    }   //вытягивает строки в виде объекта


    $mysqli->close();
    ?>


    <form action="add.php" method="post">
        <textarea name="text" cols="30" rows="10"></textarea><br>
        <input type="text" name="name"><br>
        <input type="submit" value="Ok">
    </form>
</body>

</html>