<?php

namespace Source\Factory;

use Exception;
use Source\Sorting\ParentAlgoritm;
use Source\Sorting\Types\Diagonal;
use Source\Sorting\Types\Horizontally;
use Source\Sorting\Types\Snail;
use Source\Sorting\Types\Snake;
use Source\Sorting\Types\Vertically;

class ArraySorterFactory
{
    protected const HORIZONTAL_ALGORITM = "Horizontal";
    protected const VERTICAL_ALGORITM = "Vertical";
    protected const SNAKE_ALGORITM = "Snake";
    protected const DIAGONAL_ALGORITM = "Diagonal";
    protected const SNAIL_ALGORITM = "Snail";

    protected string $kindOfSort;

    public function __construct(
        string $kindOfSort
    ) {
        $this->kindOfSort = $kindOfSort;
    }
    public function createKind(): ParentAlgoritm
    {
        try {
            switch ($this->kindOfSort) {
                case self::HORIZONTAL_ALGORITM:
                    return new Horizontally(self::HORIZONTAL_ALGORITM);
                case self::VERTICAL_ALGORITM:
                    return new Vertically(self::VERTICAL_ALGORITM);
                case self::SNAKE_ALGORITM:
                    return new Snake(self::SNAKE_ALGORITM);
                case self::DIAGONAL_ALGORITM:
                    return new Diagonal(self::DIAGONAL_ALGORITM);
                case self::SNAIL_ALGORITM:
                    return new Snail(self::SNAIL_ALGORITM);
            }
        } catch (Exception $e) {
            echo "Message: " . $e->getMessage();
        }
        die();
    }
}