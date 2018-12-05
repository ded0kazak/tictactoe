<?php

//global $error;
//var_dump($error);
if (!empty($params)) {

    foreach ($params as $error){
        echo $error . "<br>";
    }
}
//return $f;
//return $f;
?>

<form method="post">

Кто ходит первим?<br>
    <label><input type='radio' name='gamerName' value=tic>Крестик</label><br>
    <label><input type='radio' name='gamerName' value=tac>Нолик</label><br>
    <div>Размерность игрового поля:<input type="text" name="size" style="width: 100px"></div><br>
Количество элементов ряда:<input type="text" name="dimension" style="width: 100px"><br>
<input type='submit' name='start' value='Начать'>

