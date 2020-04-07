<?
session_start();

include('smile.php');
include('config.php');
include('conect.php');

if (!(isset($_SESSION['bantime']) && ($_SESSION['bantime']) > time())) {

    if (censor($_POST['text'])) {
        $mysqli->query(
            "INSERT INTO `table` VALUES (NULL, '$_POST[text]', '$_POST[name]')"
        );
        header('Location: index.php');
    } else {
        $_SESSION['bantime'] = time() + 30;
    }
}


// if (!empty($_POST['text']) && !empty($_POST['name']))
