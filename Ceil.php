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

    public function __construct(int $position)
    {
        $this->position = $position;

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
    public function getName()
    {
        return $this->name;
    }

    private function getNeighboringPositions(int $position): array
    {
        if ($this->position +1))
            $result[] =
    }







}