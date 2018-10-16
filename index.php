<?php
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});
session_start();
echo "<link href=\"style.css\" rel=\"stylesheet\">";
echo "<div class = 'field'>";
echo "<form method='post'>";
//$_SESSION = [];
$size = 5;
$dimension = 4;
$game = new Game();
var_dump($game->getCollection());
if (!isset($_POST['start']) && $_SESSION['status'] != 'play') {
    echo "<input type='radio' name='gamerName' value=1>Крестик<br>";
    echo "<input type='radio' name='gamerName' value=2>Нолик<br>";
    echo "<input type='submit' name='start' value='Начать'>";
        $game->start($size, $dimension);
        //var_dump($game->getCollection());
        $_SESSION['collection'] = $game->getCollection();
}
/*if (empty($_POST) && empty($_SESSION['collection'])) {
    echo "игра не начата";


    //$_POST = [];

   // var_dump($_SESSION);
        //echo "game start";

}*/
else {
    $_SESSION['status'] = 'play';
    $game->setCollection($_SESSION['collection']);
    //$_POST = [];
    //
    $game->start($size, $dimension);
    $name = $_POST['gamerName'] == 2 ? $_SESSION['name'] = 1 : $_SESSION['name'] = 2;
   // if (!empty($_POST)) $game->setCeilName((int)key($_POST), $name);
    //var_dump((int)key($_POST)) ;
    //var_dump($game->getCollection());
    //var_dump($game->getCeilName(8));
    if (!$game->isFinish()) {
        $ceil = 1;
        for ($i = 1; $i <= $size; $i++) {
            for ($j = 1; $j <= $size; $j++) {
                $position = $game->getCeilPosition($ceil);
                $name = $game->getCeilName($ceil);
                echo "<div class='button'><input type='submit' name = '$position' value='$name'></div>";
                $ceil++;
            }
            echo "<br>";
        }

        //var_dump($_SESSION);
        echo "</div><input type='submit' name='restart' value='Заново'></form>";
    } else {
        echo "Победитель - " . $name;
    }

    //$_SESSION['collection'] = $game->getCollection();
}

//phpinfo();
//session_unset();
//session_destroy();*/