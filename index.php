<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- Username: MOI5B2CoWP

Database name: MOI5B2CoWP

Password: C32rVPIxRA

Server: remotemysql.com

Port: 3306 -->


    <?php
    include('config.php');
    include('conect.php');
    include('smile.php');
    

    $result_count = $mysqli->query('SELECT count(*) FROM `table`');
    $count = $result_count->fetch_array(MYSQLI_NUM)[0];
    // echo "Количество строк: <b>$count</b><br>";
    $result_count->free();


    $pagecount = ceil($count / $pagesize);

    $currientpage = $_GET['page'] ?? 1;

    $startrow = ($currientpage - 1) * $pagesize;

    $pageination = "<div class='padeination'>";

    for ($i = 1; $i <= $pagecount; $i++) {
        $pageination .= "<a href='?page=$i'>$i</a>";
    }
    $pageination = "</div>";

    $result = $mysqli->query('SELECT * FROM `table` LIMIT $startrow, $pagesize');

    echo $pageination;

    while ($row = $result->fetch_object()) {
        echo "<tr>";
        echo "<td><b>" . smile($row->text) . "</b> <i>$row->name</i><br></td>";
        echo "</tr>";
    }
    $result->free();

    $mysqli->close();
    ?>
    <form action="add.php" method="POST">
        <textarea name="text" cols="30" rows="10"></textarea> <br>
        <input type="text" name="name"><br>
        <input type="submit" value="ok">
    </form>
</body>

</html>