<?php

namespace Source\Source;

use Source\Interfaces\CallOthers;

class ParentAlgoritm implements CallOthers
{
    protected string $name;
    protected int $sizeOfArray;
    public array $diffArray;
    public array $inputArray;
    public array $outputArray;

    public const HORIZONTAL_ALGORITM = "Horizontal";
    public const VERTICAL_ALGORITM = "Vertical";
    public const SNAKE_ALGORITM = "Snake";
    public const DIAGONAL_ALGORITM = "Diagonal";
    public const SNAIL_ALGORITM = "Snail";

    function __construct(string $name, array $inputArray, int $sizeOfArray)
    {
       $this->name = $name;
       $this->sizeOfArray = $sizeOfArray;
       $this->inputArray = $inputArray;

    }

    public function callDiffArray()
    {
        $diff = new DiffArray;
        $this->diffArray = $diff->sortDiff($this->inputArray);
    }

    public function callOutput()
    {
        $txt = new OutputInTxt;
        $screen = new OutputOnScreen;
        $txt->outputArray($this->outputArray, $this->sizeOfArray, $this->name);
        $screen->outputArray($this->outputArray, $this->sizeOfArray, $this->name);
    }


}