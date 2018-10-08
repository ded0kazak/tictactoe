<form method="post">
    <input type="text" name="nameCeil">
    <input type="submit" value="Send">
<?php
session_start();
//$_SESSION = [];
if (!isset($_POST['nameCeil'])) {
   // $_SESSION['nameCeil'] = [];
    $_SESSION['nameCeil'][] = $_POST['nameCeil'];
    var_dump($_SESSION['nameCeil']);
}
else {
    var_dump($_SESSION['nameCeil']);
    $_SESSION['nameCeil'][] = $_POST['nameCeil'];
}
var_dump($_SESSION['nameCeil']);