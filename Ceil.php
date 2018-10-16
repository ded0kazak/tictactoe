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

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getPosition(): int
    {
        return $this->position;
    }

    /**
     * @return mixed
     */
    public function getName(): ?int
    {
        return $this->name;
    }

    /**
     * @return Coordinates
     */
    public function getCoordinates(): Coordinates
    {
        return $this->coordinates;
    }

}