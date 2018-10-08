<?php
/**
 * Created by PhpStorm.
 * User: php
 * Date: 06.10.18
 * Time: 19:00
 */


class Game
{
    /**
     * @var Collection
     */
    private $collection;

    public function start(int $colN)
    {
        if (!isset($_SESSION['collection'])) {
            $ceils = [];
            for ($i = 1; $i <= pow($colN, 2); $i++) {
                $ceils[] = new Ceil($i);
            }
            $this->collection = new Collection($ceils);
            $_SESSION['collection'] = $this->collection;
        }
        else
            $this->collection = $_SESSION['collection'];
    }

    /**
     * @return Collection
     */
    public function getCeilPosition(int $ceil)
    {
        return $this->collection->getCeil($ceil)->getPosition();
    }

    public function getCeilName(int $ceil)
    {
        return $this->collection->getCeil($ceil)->getName();
    }

    public function setCeilName($position, $name)
    {
        $ceil = $this->collection->getCeil($position);
        $ceil->setName($name);
        //return $name;
    }

    public function getCollection()
    {
        return $this->collection;
    }


}