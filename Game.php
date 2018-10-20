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

    private $dimension;

    private $size;

    public function __construct(int $size, int $dimension)
    {
        $this->dimension = $dimension;
        $this->size = $size;
    }

    public function start(int $size, int $dimension)
    {

        //if (!isset($_SESSION['collection'])) {
            $ceils = [];
            for ($i = 1; $i <= pow($size, 2); $i++) {
                $ceils[] = new Ceil($i, $this->getCoordinates($i, $size));
            }
            $this->collection = new Collection($ceils);
            //$_SESSION['collection'] = $this->collection;
        //}
      //  else
        //    $this->collection = $_SESSION['collection'];
        return true;
    }

    /**
     * @param Collection $collection
     */
    public function setCollection(Collection $collection): void
    {
        $this->collection = $collection;
    }



    /**
     * @return Collection
     */
    public function getCeilPosition(int $ceil)
    {
        return $this->getCeil($ceil)->getPosition();
    }

    public function getCeilName(int $ceil)
    {
        return $this->collection->getCeil($ceil)->getName();
    }

    public function setCeilName($position, $name)
    {

        $ceil = $this->getCeil($position);
        if (!$ceil->getName())
            $ceil->setName($name);
        //return $name;
    }

    public function getCollection(): ?Collection
    {
        return $this->collection;
    }


    public function getWinningCombination()
    {
        //var_dump($this->collection->getMainDiagCeils($this->dimension, $this->size));
        $winningCombination = $this->collection->getHorizontal($this->dimension, $this->size);
        if ($winningCombination)
            return $winningCombination;
        $winningCombination = $this->collection->getVertical($this->dimension, $this->size);
        if ($winningCombination)
            return $winningCombination;
        $winningCombination = $this->collection->getMainDiag($this->dimension, $this->size);
        if ($winningCombination)
            return $winningCombination;
        $winningCombination = $this->collection->getSideDiag($this->dimension, $this->size);
        if ($winningCombination)
            return $winningCombination;




    }


    public function isFinish(): bool
    {
        $result = false;
        if($this->getWinningCombination()){

                $result = true;
        }

        return $result;
    }

    private function getCeil($ceil)
    {
        return $this->collection->getCeil($ceil);
    }


    private function getCoordinates($i, $size)
    {
        $rowN = ceil($i / $size);
        $colN = $i < $size ? $i : $i % $size;
        $colN = $colN == 0 ? $i / $rowN : $colN;
        //$coordinates[] = [$rowN, $colN];
        //var_dump($coordinates);
        return new Coordinates($rowN, $colN);
    }

}