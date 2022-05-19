<?php

namespace Source\Factory;

use Source\Sorting\Types\Diagonal;
use Source\Sorting\Types\Horizontally;
use Source\Sorting\Types\Snail;
use Source\Sorting\Types\Snake;
use Source\Sorting\Types\Vertically;

class ArraySorterFactory extends ArrayConstruct
{
    public function createKind(): object|null
    {
        switch ($this->kindOfSort) {
            case self::HORIZONTAL_ALGORITM:
                return new Horizontally(
                    self::HORIZONTAL_ALGORITM,
                    $this->sizeOfArray,
                    $this->action
                );
            case self::VERTICAL_ALGORITM:
                return new Vertically(
                    self::VERTICAL_ALGORITM,
                    $this->sizeOfArray,
                    $this->action
                );
            case self::SNAKE_ALGORITM:
                return new Snake(
                    self::SNAKE_ALGORITM,
                    $this->sizeOfArray,
                    $this->action
                );
            case self::DIAGONAL_ALGORITM:
                return new Diagonal(
                    self::DIAGONAL_ALGORITM,
                    $this->sizeOfArray,
                    $this->action
                );
            case self::SNAIL_ALGORITM:
                return new Snail(
                    self::SNAIL_ALGORITM,
                    $this->sizeOfArray,
                    $this->action
                );
            default:
                echo "Choice kind of sort!";
                return null;
        }
    }


}