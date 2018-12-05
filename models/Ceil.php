<?php
/**
 * Created by PhpStorm.
 * User: php
 * Date: 06.10.18
 * Time: 18:59
 */

class Ceil
{
    private $name;
    private $position;
    private $coordinates;

    public function __construct(int $position, Coordinates $coordinates)
    {
        $this->position = $position;
        $this->coordinates = $coordinates;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }


    public function getPosition(): int
    {
        return $this->position;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getCoordinates(): Coordinates
    {
        return $this->coordinates;
    }

}