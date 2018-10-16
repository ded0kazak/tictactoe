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
    private $horizontalCeils = [];
    private $verticalCeils = [];
    private $mainDiagCeils = [];


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

    public function setCeilName($name, $position)
    {
        $item = $this->getCeil($position);
        $item->setName($name);
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    public function getHorizontal($dimension, $size)
    {
       foreach ($this->getHorizontalCeils($dimension, $size) as $gorizontalCeil) {
           if ($gorizontalCeil->getName() != null){
               $winningCombination = [];
             //  $rowN = $gorizontalCeil->getCoordinates()->getRowN();
               $position = $gorizontalCeil->getPosition();
               for ($i = 1; $i < $dimension; $i++) {
                   $nextCeil = $this->getCeil($position + $i);
                  // $nextRowN = $nextCeil->getCoordinates()->getRowN();
                   if ($nextCeil->getName() != null && $gorizontalCeil->getName() == $nextCeil->getName()) {
                    //   if ($rowN == $nextRowN)
                           $winningCombination[] = $nextCeil->getName();
                      // var_dump($winningCombination);
                       if (count($winningCombination) == ($dimension - 1)) {
                           return $winningCombination;
                       }
                   }
                   else {
                       break;
                   }
               }
           }
       }
    }

    public function getVertical($dimension, $size)
    {
        foreach ($this->getVerticalCeils($dimension, $size) as $verticalCeil) {
            if ($verticalCeil->getName() != null) {
                $winningCombination = [];
                //$colN = $verticalCeil->getCoordinates()->getcolN();
                $position = $verticalCeil->getPosition();
                for ($i = 1; $i < $dimension; $i++) {
                    $nextCeil = $this->getCeil($position + ($size * $i));
                    //$nextColN = $nextCeil->getCoordinates()->getcolN();
                    if ($nextCeil->getName() != null && $verticalCeil->getName() == $nextCeil->getName()) {
                        //echo $j;
                        //if ($colN == $nextColN)
                            $winningCombination[] = $nextCeil->getName();
                        //var_dump($winningCombination);
                        if (count($winningCombination) == ($dimension - 1)) {
                            return $winningCombination;
                        }
                    }
                    else {
                        break;
                    }
                }
            }
        }
    }

    public function getMainDiag($dimension, $size)
    {
        foreach ($this->getMainDiagCeils($dimension, $size) as $diagCeil) {
            if ($diagCeil->getName() != null) {
                $winningCombination = [];
                //$colN = $verticalCeil->getCoordinates()->getcolN();
                $position = $diagCeil->getPosition();
                for ($i = 1; $i < $dimension; $i++) {
                    $nextCeil = $this->getCeil($position + ($size * $i) + $i);
                    //$nextColN = $nextCeil->getCoordinates()->getcolN();
                    if ($nextCeil->getName() != null && $diagCeil->getName() == $nextCeil->getName()) {
                        //echo $j;
                        //if ($colN == $nextColN)
                        $winningCombination[] = $nextCeil->getName();
                        //var_dump($winningCombination);
                        if (count($winningCombination) == ($dimension - 1)) {
                            return $winningCombination;
                        }
                    }
                    else {
                        break;
                    }
                }
            }
        }
    }

    public function getSideDiag($dimension, $size)
    {
        foreach ($this->getMainDiagCeils($dimension, $size) as $diagCeil) {
            $sideCeilPos = $diagCeil->getPosition();
            $sideCeil = $this->getCeil($sideCeilPos + ($dimension - 1));
            if ($sideCeil->getName() != null) {
                $winningCombination = [];
                //$colN = $verticalCeil->getCoordinates()->getcolN();
                $position = $sideCeil->getPosition();
                for ($i = 1; $i < $dimension; $i++) {
                    $nextCeil = $this->getCeil($position + ($size * $i) - $i);
                    //$nextColN = $nextCeil->getCoordinates()->getcolN();
                    if ($nextCeil->getName() != null && $sideCeil->getName() == $nextCeil->getName()) {
                        //echo $j;
                        //if ($colN == $nextColN)
                        $winningCombination[] = $nextCeil->getName();
                        var_dump($winningCombination);
                        if (count($winningCombination) == ($dimension - 1)) {
                            return $winningCombination;
                        }
                    }
                    else {
                        break;
                    }
                }
            }
        }
    }

    private function getHorizontalCeils($dimension, $size)
    {
        foreach ($this->items as $ceil) {
            if (($ceil->getCoordinates()->getColN() + $dimension) <= ($size + 1) )
                $this->horizontalCeils[] = $ceil;
        }
        return $this->horizontalCeils;
    }

    private function getVerticalCeils($dimension, $size)
    {
        foreach ($this->items as $ceil) {
            if (($ceil->getCoordinates()->getRowN() + $dimension) <= ($size + 1) )
                $this->verticalCeils[] = $ceil;
        }
        return $this->verticalCeils;
    }

    private function getMainDiagCeils($dimension, $size)
    {
        foreach ($this->items as $ceil) {
            $rowN = $ceil->getCoordinates()->getRowN() + $dimension;
            $colN = $ceil->getCoordinates()->getColN() + $dimension;
            if (($rowN <= ($size + 1)) && ($colN <= ($size + 1)))
                $this->mainDiagCeils[] = $ceil;
        }
        return $this->mainDiagCeils;
    }
}