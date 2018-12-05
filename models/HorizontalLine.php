<?php
/**
 * Created by PhpStorm.
 * User: php
 * Date: 01.12.18
 * Time: 2:47
 */

class HorizontalLine extends Result
{
    protected function getWinningCombineCeil(Ceil $ceil, int $dimension, int $size): bool
    {
        $result = false;
        if (($ceil->getCoordinates()->getColN() + $dimension) <= ($size + 1)) {
            $result = true;
        }
        return $result;
    }
    protected function getNextCeilPosition(int $position, int $size, int $i): int
    {
        return $position + $i;
    }
}