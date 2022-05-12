<?php

namespace Source\Controller;

use Source\Sorting\Types\Diagonal;
use Source\Sorting\Types\Horizontally;
use Source\Sorting\Types\Snail;
use Source\Sorting\Types\Snake;
use Source\Sorting\Types\Vertically;

class CallMethods
{
    private object $horizontally;
    private object $vertically;
    private object $snake;
    private object $diagonal;
    private object $snail;

    protected int $sizeOfArray;
    protected array $inputArray;

    function __construct(int $sizeOfArray, array $inputArray)
    {
        $this->sizeOfArray = $sizeOfArray;
        $this->inputArray = $inputArray;

        $this->horizontally = new Horizontally(
            $this->inputArray,
            $this->sizeOfArray
        );

        $this->vertically = new Vertically(
            $this->inputArray,
            $this->sizeOfArray
        );

        $this->snake = new Snake(
            $this->inputArray,
            $this->sizeOfArray
        );

        $this->diagonal = new Diagonal(
            $this->inputArray,
            $this->sizeOfArray
        );

        $this->snail = new Snail(
            $this->inputArray,
            $this->sizeOfArray
        );
    }

    public function callRun(): void
    {
        $this->horizontally->callDiffArray();
        $this->horizontally->sortArray();
        $this->horizontally->callOutput();
        $this->horizontally->callDBConnection();

        $this->vertically->callDiffArray();
        $this->vertically->sortArray();
        $this->vertically->callOutput();
        $this->vertically->callDBConnection();

        $this->snake->callDiffArray();
        $this->snake->sortArray();
        $this->snake->callOutput();
        $this->snake->callDBConnection();

        $this->diagonal->callDiffArray();
        $this->diagonal->sortArray();
        $this->diagonal->callOutput();
        $this->diagonal->callDBConnection();

        $this->snail->callDiffArray();
        $this->snail->sortArray();
        $this->snail->callOutput();
        $this->snail->callDBConnection();
    }

}