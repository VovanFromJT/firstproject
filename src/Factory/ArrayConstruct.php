<?php

namespace Source\Factory;

class ArrayConstruct
{
    protected const HORIZONTAL_ALGORITM = "Horizontal";
    protected const VERTICAL_ALGORITM = "Vertical";
    protected const SNAKE_ALGORITM = "Snake";
    protected const DIAGONAL_ALGORITM = "Diagonal";
    protected const SNAIL_ALGORITM = "Snail";

    protected int $sizeOfArray;
    protected int $action;
    protected string $kindOfSort;

    public function __construct(
        int $sizeOfArray,
        string $kindOfSort,
        int $action
    ) {
        $this->sizeOfArray = $sizeOfArray;
        $this->action = $action;
        $this->kindOfSort = $kindOfSort;
    }
}