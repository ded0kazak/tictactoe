<?php
/**
 * Created by PhpStorm.
 * User: php
 * Date: 24.10.18
 * Time: 21:49
 */


abstract class Result extends Gaming
{
    abstract protected function getWinningCombineCeil(Ceil $ceil, int $dimension, int $size);
    abstract protected function getNextCeilPosition(int $position, int $size, int $i);
    public function getResult(Gaming $game): array
    {
        $size = $game->size;
        $dimension = $game->dimension;
        $allCeils = $game->getCollection()->getItems();
        $combine = $this->getWinningCombine($allCeils, $dimension, $size);
        $winningCombination = [];
        foreach ($combine as $ceil) {
            if ($ceil->getName() != null && count($winningCombination) != ($game->dimension - 1)) {
                $winningCombination = [];
                $position = $ceil->getPosition();
                for ($i = 1; $i < $game->dimension; $i++) {
                    $nextCeil = $this->getNextCeil($game, $position, $size, $i);
                    $name = $this->getWinningCeilName($ceil, $nextCeil);
                    if ($name != null) {
                        $winningCombination[] = $name;
                    }
                    else {
                        break;
                    }
                }
            }
        }
        return $winningCombination;
    }

    private function getWinningCeilName(Ceil $ceil, Ceil $nextCeil): ?string
    {
        $name = null;
        if ($nextCeil->getName() != null && $ceil->getName() == $nextCeil->getName()) {
            $name = $nextCeil->getName();
        }
        return $name;
    }

    private function getNextCeil(Gaming $game, int $position, int $size, int $i):Ceil
    {
        $collection = $game->getCollection();
        return $collection->getCeil($this->getNextCeilPosition($position, $size, $i));
    }

    private function getWinningCombine(array $allCeils, int $dimension, int $size): array
    {
        foreach ($allCeils as $ceil) {
            if ($this->getWinningCombineCeil($ceil, $dimension, $size)) {
                $ceils[] = $ceil;
            }
        }
        return $ceils;
    }
}