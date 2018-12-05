<?php
/**
 * Created by PhpStorm.
 * User: php
 * Date: 12.10.18
 * Time: 23:44
 */

class Coordinates
{
    private $rowN;
    private $colN;

    public function __construct(int $rowN, int $colN)
    {
        $this->rowN = $rowN;
        $this->colN = $colN;
    }

    public function getRowN(): int
    {
        return $this->rowN;
    }


    public function getColN(): int
    {
        return $this->colN;
    }


}