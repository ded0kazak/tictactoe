<?php
/**
 * Created by PhpStorm.
 * User: php
 * Date: 06.10.18
 * Time: 19:00
 */

class Collection
{
    private $items = [];

    public function __construct(array $items)
    {
        $this->items = $items;
    }


    public function getCeil(int $position): Ceil
    {
        foreach ($this->items as $item) {
            if ($item->getPosition() == $position)
                return $item;
        }
    }

    public function setCeilName(string $name, int $position): void
    {
        $item = $this->getCeil($position);
        $item->setName($name);
    }


    public function getItems(): array
    {
        return $this->items;
    }

    public function getFullCeilsName(): bool
    {
        foreach ($this->items as $ceil) {
            if (is_null($ceil->getName()))
                return true;
        }
        return false;
    }

}