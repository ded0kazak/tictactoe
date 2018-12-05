<?php
/**
 * Created by PhpStorm.
 * User: php
 * Date: 01.12.18
 * Time: 2:45
 */

class MainDiag extends Result
{
    protected function getWinningCombineCeil(Ceil $ceil, int $dimension, int $size): bool
    {
        $result = false;
        $rowN = $ceil->getCoordinates()->getRowN() + $dimension;
        $colN = $ceil->getCoordinates()->getColN() + $dimension;
        if (($rowN <= ($size + 1)) && ($colN <= ($size + 1))) {
            $result = true;
        }
        return $result;
    }
    protected function getNextCeilPosition(int $position, int $size, int $i): int
    {
        return $position + ($size * $i) + $i;
    }
}