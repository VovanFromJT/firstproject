<?php

namespace Source\Source;

use Source\Interfaces\CallOthers;

class ParentAlgoritm implements CallOthers
{
    private string $name;
    protected int $sizeOfArray;
    protected array $diffArray;
    protected array $inputArray;
    protected array $outputArray;

    protected const HORIZONTAL_ALGORITM = "Horizontal";
    protected const VERTICAL_ALGORITM = "Vertical";
    protected const SNAKE_ALGORITM = "Snake";
    protected const DIAGONAL_ALGORITM = "Diagonal";
    protected const SNAIL_ALGORITM = "Snail";

    function __construct(
        string $name,
        array $inputArray,
        int $sizeOfArray
    ) {
       $this->name = $name;
       $this->sizeOfArray = $sizeOfArray;
       $this->inputArray = $inputArray;

    }

    public function callDiffArray(): void
    {
        $diff = new DiffArray;
        $this->diffArray = $diff->sortDiff($this->inputArray);
    }

    public function callOutput(): void
    {
        $txt = new OutputInTxt;
        $screen = new OutputOnScreen;
        $txt->outputArray(
            $this->outputArray,
            $this->sizeOfArray,
            $this->name
        );
        $screen->outputArray(
            $this->outputArray,
            $this->sizeOfArray,
            $this->name
        );
    }


}