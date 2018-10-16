<?php
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
//столбец
//$cols = 3;
//строка
//$rows = 3;
//echo (1%3);
$dimension = 3;

for ($i = 1; $i <= pow($dimension, 2); $i++) {
    $arr[$i] = getCoordinates($i, $dimension);
}

$horizontal = array_chunk($arr, $dimension, true);
var_dump($horizontal);

function getCoordinates($i, $dimension) {

   // static $prevRowN = 1;
    $rowN = ceil($i / $dimension);
    //$prevRowN = $prevRowN == $rowN ? $rowN : $rowN + 1;
    $colN = $i < $dimension ? $i : $i % $dimension;
    $colN = $colN == 0 ? $i / $rowN : $colN;
   // static $horizontal;
    //$prevRowN ==  $rowN ? $horizontal[] = [$rowN, $colN] : function($rowN, $colN){
      //  $horizontal = [];
       // $horizontal[] = [$rowN, $colN];
    //};
    //var_dump($horizontal);

    $prevRowN = $rowN;
    $coordinates[] = [$rowN, $colN];
    return $coordinates;
}
//phpinfo();
/*foreach ($arr as $item) {
    $item[0] == $item[1] ? $diag[] = [$rowN, $colN] : $block[] = function ($item){
        $item[0]
        return 5;
    };
}*/