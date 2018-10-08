<?php
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});
session_start();
//$_SESSION = [];
$colN = 4;
$game = new Game($colN);
$game->start($colN);
echo "<link href=\"style.css\" rel=\"stylesheet\">";
echo "<div class = 'field'>";
echo "<form method='post'>";
//echo "<input type='submit' name='123' value='send'>";
$name = $_SESSION['name'] == 0 ? $_SESSION['name'] = 1 : $_SESSION['name'] = 0;
if (!empty($_POST)) $game->setCeilName((int)key($_POST), $name);
//var_dump((int)key($_POST)) ;
//var_dump($game->getCollection());
//var_dump($game->getCeilName(8));
$ceil =1;
for ($i = 1; $i <= $colN; $i++) {
    for ($j = 1; $j <= $colN; $j++) {
        $position = $game->getCeilPosition($ceil);
        $name = $game->getCeilName($ceil);
        echo "<div class='button'><input type='submit' name = '$position' value='$name'></div>";
        $ceil++;
    }
    echo "<br>";
}

//phpinfo();
//session_unset();
//session_destroy();*/