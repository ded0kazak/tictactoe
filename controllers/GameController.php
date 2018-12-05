<?php

/**
 * Created by PhpStorm.
 * User: php
 * Date: 18.11.18
 * Time: 0:15
 */


class GameController
{
    public function actionIndex()
    {
        $errors = [];
        if (isset($_POST["start"])) {
            $data = $_POST;
            if (empty($errors = Verify::checkData($data))) {
                $size = (int)$data["size"];
                $dimension = (int)$data["dimension"];
                $gamerName = $data["gamerName"];
                $game = Gaming::createGame();
                $care = Caretacker::createCaretacker();
                $game->startGame($dimension, $gamerName, $size);
                $care->saveGame($game);
                header('Location: /game');
            }

        }
        return $this->redirect('main', $errors);
    }

    public function actionGame()
    {
        $game = Gaming::createGame();
        $care = Caretacker::createCaretacker();
        $care->extractGame($game);
        $collection = $game->getCollection();
        if ($_POST && $game->move($_POST["puzzle"])) {
            if (!($game->isFinish())) {
                $game->changeGamer();
            }
            else {
                $params = [
                    'collection' => $collection,
                    'winner' => $game->getStatus()
                ];
            }
        }
        $care->saveGame($game);
        if (!isset($params)) {
            $params = [
                'collection' => $collection
                ];
        }
        return $this->redirect('game', $params);
    }

    private function redirect(string $viewName, array $params = []) {
        $viewFile = ROOT . "/views/" . $viewName . ".php";
        if (file_exists($viewFile))
        require ($viewFile);
    }

}