<?php
/**
 * Created by PhpStorm.
 * User: php
 * Date: 26.11.18
 * Time: 1:16
 */

class Memento
{
    private $collection;
    private $dimension;
    private $gamerName;
    private $size;

    public function __construct(Collection $collection, int $dimension, string $gamerName, int $size)
    {
        $this->collection = $collection;
        $this->dimension = $dimension;
        $this->gamerName = $gamerName;
        $this->size = $size;

    }

    public function getCollection(): Collection
    {
        return $this->collection;
    }

    public function getDimension(): int
    {
        return $this->dimension;
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function getGamerName(): string
    {
        return $this->gamerName;
    }

}