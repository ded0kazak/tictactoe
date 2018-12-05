<?php
/**
 * Created by PhpStorm.
 * User: php
 * Date: 18.11.18
 * Time: 0:31
 */

class Router
{
    private $routs = [
        "" => "game/index",
        "game" => "game/game",
        ];

    public function run()
    {
        $uri = $this->getURI();
        foreach ($this->routs as $pattern => $path) {
            if (preg_match("/^$pattern$/", $uri)) {
                $address = explode("/", $path);
                $controllerName = ucfirst(array_shift($address)) . "Controller";
                $actionName = "action" . ucfirst(array_shift($address));
                $controllerFile = ROOT . "/controllers/" . $controllerName . ".php";
                if (file_exists($controllerFile)) {
                    $controller = new $controllerName;
                    $controller->$actionName();
                }
            }
        }

    }

    private function getURI(): string
    {
        if (!empty($_SERVER["REQUEST_URI"])) {
            return trim($_SERVER["REQUEST_URI"], "/");
        }
    }

}