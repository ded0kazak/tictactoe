<?php
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});
$colN = 4;
$game = new Game($colN);
$i = 0;
while ($i != 10) {
    $ceil = 1;
    for ($i = 1; $i <= $colN; $i++) {
        for ($j = 1; $j <= $colN; $j++) {
            echo sprintf("    %d    ", $game->getCeilName($ceil));
            $ceil++;
        }
        echo PHP_EOL;
    }
    echo PHP_EOL;
    if ($i != 10) {
        $numberValue = trim(readline("enter number value to push: "));
        try {
            $game->setCeilName($numberValue);
            //$countPushes++;
        } catch (\Throwable $e) {
            echo "invalid value {$numberValue}" . PHP_EOL;
        }
        $i++;
    }
}