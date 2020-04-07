<?
include('config.php');
include('conect.php');

if (!empty($_POST['text']) && !empty($_POST['name'])) {
    $mysqli->query(
        "INSERT INTO `table` VALUES (NULL, '$_POST[text]', '$_POST[name]')"
    );
    header('Location: index.php');
}