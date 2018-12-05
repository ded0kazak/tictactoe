<?php
/**
 * Created by PhpStorm.
 * User: php
 * Date: 24.11.18
 * Time: 0:07
 */

class Gaming
{
    const TIC = 'tic';
    const TAC = 'tac';
    const CLASSES = ['HorizontalLine', 'VerticalLine', 'MainDiag', 'SideDiag'];
    private static $instance = null;
    protected $collection;
    protected $dimension;
    protected $gamerName;
    protected $size;
    private $status;

    private function __construct()
    {

    }

    public static function createGame()
    {
        if (self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function startGame(int $dimension, string $gamerName, int $size)
    {
        $this->dimension = $dimension;
        $this->gamerName = $gamerName;
        $this->size = $size;
        $ceils = [];
        for ($i = 1; $i <= pow($size, 2); $i++) {
            $ceils[] = new Ceil($i, $this->getCoordinates($i, $size));
        }
        $this->collection = new Collection($ceils);
    }

    public function save()
    {
        return new Memento($this->collection, $this->dimension, $this->gamerName, $this->size);
    }

    public function restore(Memento $memento)
    {
        $this->collection = $memento->getCollection();
        $this->dimension = $memento->getDimension();
        $this->gamerName = $memento->getGamerName();
        $this->size = $memento->getSize();
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getCollection(): Collection
    {
        return $this->collection;
    }

    public function isFinish(): bool
    {
        if ($this->collection->getFullCeilsName()) {
            foreach (self::CLASSES as $combine) {
                $result = new $combine();
                if (count($result->getResult($this)) === ($this->dimension - 1)) {
                    $this->status = "Выиграл&nbsp;" . $this->gamerName;
                    return true;
                }
            }
        }
        else {
            $this->status = "Игра закончена. Ничья)";
            return true;
        }
        return false;
    }

    public function move($position): bool
    {
        $ceil = $this->collection->getCeil($position);
        if (is_null($ceil->getName())) {
            $ceil->setName($this->gamerName);
            return true;
        }
        return false;
    }

    public function changeGamer(): void
    {
        $this->gamerName === Gaming::TIC ? $this->gamerName = Gaming::TAC : $this->gamerName = Gaming::TIC;
    }

    private function getCoordinates(int $i, int $size): Coordinates
    {
        $rowN = ceil($i / $size);
        $colN = $i < $size ? $i : $i % $size;
        $colN = $colN == 0 ? $i / $rowN : $colN;
        return new Coordinates($rowN, $colN);
    }
}