<form method="post">
    <link href="style.css" rel="stylesheet">
<?php
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});
session_start();
var_dump($_POST);
//$a = $_POST;
//if (isset($_POST['start']) && empty($_SESSION))
if (isset($_POST['restart']) || empty($_POST)) {
    $a = <<<EOL
    Кто ходит первим?<br>
    <input type='radio' name='gamerName' value=1>Крестик<br>
    <input type='radio' name='gamerName' value=2>Нолик<br>
    Размерность игрового поля:<input type="text" name="size"><br>
    Колдичество єлементов ряда:<input type="text" name="dimension"><br>
    <input type='submit' name='start' value='Начать'>
EOL;
    echo $a;
    session_unset();
    session_destroy();
} else {
    $gamerName = (int)$_POST['gamerName'];
    $size = (int)$_POST['size'];
    $dimension = (int)$_POST['dimension'];
    $gamerName == 2 ? $gamerName = 1 : $gamerName = 2;
    echo "<input type='hidden' name='size' value='" . $size . "'>";
    echo "<input type='hidden' name='dimension' value='" . $dimension . "'>";
    echo "<input type='hidden' name='gamerName' value='" . $gamerName . "'>";

   // $player = (int)$_POST['gamerName'];
    //var_dump($size);
    $game = new Game($size, $dimension);
    if (empty($_SESSION['collection'])) {
        $game->start($size, $dimension);
        $_SESSION['collection'] = $game->getCollection();
    } else {
        $game->setCollection($_SESSION['collection']);
    }
    $arr = array_keys($_POST);
    $position = end($arr);

    var_dump($_POST[$position]);
    if (is_int($position)) $game->setCeilName((int)$position, (int)$gamerName);

    if (!$game->isFinish()) {
        $ceil = 1;
        echo "<div style='width: " . $size * 50 . "'>";
        for ($i = 1; $i <= $size; $i++) {
            for ($j = 1; $j <= $size; $j++) {
                $position = $game->getCeilPosition($ceil);
                $name = $game->getCeilName($ceil);
                switch ($name) {
                    case 1:
                        echo "<div class='button'><input type='submit' name = '$position' value='$name' class='tac' disabled></div>";
                        break;
                    case 2:
                        echo "<div class='button'><input type='submit' name = '$position' value='$name' class='tic' disabled></div>";
                        break;
                    default:
                        echo "<div class='button'><input type='submit' name = '$position' value='$name' class='none'></div>";
                        break;
                }
                $ceil++;
            }
            echo "<br>";
        }

    } else {
        echo "Победитель - " . $gamerName;
    }

    echo "<input type='submit' name='restart' value='restart'>";

}
