<?php

namespace Source\Controller;

use Source\Helper\GenerateArray;
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
    private object $generateArray;

    protected int $sizeOfArray;
    protected array $inputArray;

    function __construct(int $sizeOfArray)
    {
        $this->sizeOfArray = $sizeOfArray;

        $this->generateArray = new GenerateArray($this->sizeOfArray);
        $this->inputArray = $this->generateArray->generate();

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
        $this->horizontally->sorting();
        $this->horizontally->callOutput();
        $this->horizontally->callDBConnection();

        $this->vertically->callDiffArray();
        $this->vertically->sorting();
        $this->vertically->callOutput();
        $this->vertically->callDBConnection();

        $this->snake->callDiffArray();
        $this->snake->sorting();
        $this->snake->callOutput();
        $this->snake->callDBConnection();

        $this->diagonal->callDiffArray();
        $this->diagonal->sorting();
        $this->diagonal->callOutput();
        $this->diagonal->callDBConnection();

        $this->snail->callDiffArray();
        $this->snail->sorting();
        $this->snail->callOutput();
        $this->snail->callDBConnection();
    }

}