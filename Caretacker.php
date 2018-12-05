<?php
/**
 * Created by PhpStorm.
 * User: php
 * Date: 26.11.18
 * Time: 1:25
 */
//session_start();
require_once ROOT . "/Db.php";
class Caretacker
{
    private $memento;

    private static $instance = null;

    public static function createCaretacker(): Caretacker
    {
        if (self::$instance == null) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function saveGame(Gaming $game): void
    {
        $this->memento = $game->save();
        $db = Db::Connection();
        $obj = serialize($this->memento);
        $db->set("game", $obj);
        //$_SESSION["game"] = $obj;
    }

    public function extractGame(Gaming $game)
    {
        $db = Db::Connection();
        $obj = $db->get("game");
        //$obj = $_SESSION["game"];
        $this->memento = unserialize($obj);
        return $game->restore($this->memento);

    }
}