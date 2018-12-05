<?php
/**
 * Created by PhpStorm.
 * User: php
 * Date: 23.11.18
 * Time: 22:51
 */

class Verify
{
    private static $rules = [
        "gamerName" => "/^(tic|tac)$/",
        "size" => "/^([3-9]|[1-2][0-9])$/",
        "dimension" => "/^[3-50]$/"
    ];

    private static $errors = [
        "gamerName" => "Выберите кто ходит первым",
        "size" => "Неверно заполнено поле  - размерность(число от 3-х до 29)",
        "dimension" => "Неверно заполнено поле - количество(число от 3-х до 29)",
        "diff" => "Размерность поля не может быть меньше количества элементов ряда"
    ];

    public static function checkData($data): array
    {
        array_pop($data);
        foreach (self::$rules as $key => $value) {
            if (array_key_exists($key, $data)){
                if(preg_match($value, $data[$key])) {
                    unset(self::$errors[$key]);
                }
            }
        }
        if ($data["dimension"] <= $data["size"]) {
            unset(self::$errors["diff"]);
        }
        return self::$errors;
    }
}