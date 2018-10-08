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

    /**
     * @return array
     */
    public function getCeil($position): Ceil
    {
        foreach ($this->items as $item) {
            if ($item->getPosition() == $position)
                return $item;
        }
    }

    public function setCeilName($val, $position)
    {
        $item = $this->getCeil($position);
        $item->setName($val);
        $this->setSegment($position);

    }

    private function setSegment($position)
    {
        foreach ($this->items as $item) {
            $neigh = $item->NeighboringPositions();
            foreach ($neigh as )
        }
    }






}