<?php

namespace Source\Controller;

use Source\Sorting\Types\Diagonal;
use Source\Sorting\Types\Horizontally;
use Source\Sorting\Types\Snail;
use Source\Sorting\Types\Snake;
use Source\Sorting\Types\Vertically;

class CallMethods
{
    protected int $sizeOfArray;
    private string $kindOfSort;
    private int $action;

    function __construct(
        int $sizeOfArray,
        string $kindOfSort,
        int $action
    ) {
        $this->sizeOfArray = $sizeOfArray;
        $this->kindOfSort = $kindOfSort;
        $this->action = $action;
    }

    public function callRun(): void
    {
        switch ($this->kindOfSort) {
            case "horizontal":
                $horizontally = new Horizontally(
                    $this->sizeOfArray,
                    $this->action
                );
                $horizontally->runApp();
                break;
            case "vertical":
                $vertically = new Vertically(
                    $this->sizeOfArray,
                    $this->action
                );
                $vertically->runApp();
                break;
            case "snake":
                $snake = new Snake(
                    $this->sizeOfArray,
                    $this->action
                );
                $snake->runApp();
                break;
            case "diagonal":
                $diagonal = new Diagonal(
                    $this->sizeOfArray,
                    $this->action
                );
                $diagonal->runApp();
                break;
            case "snail":
                $snail = new Snail(
                    $this->sizeOfArray,
                    $this->action
                );
                $snail->runApp();
                break;
            default:
                $horizontally = new Horizontally(
                    $this->sizeOfArray,
                    $this->action
                );

                $vertically = new Vertically(
                    $this->sizeOfArray,
                    $this->action
                );

                $snake = new Snake(
                    $this->sizeOfArray,
                    $this->action
                );

                $diagonal = new Diagonal(
                    $this->sizeOfArray,
                    $this->action
                );

                $snail = new Snail(
                    $this->sizeOfArray,
                    $this->action
                );

                $horizontally->runApp();
                $vertically->runApp();
                $snake->runApp();
                $diagonal->runApp();
                $snail->runApp();
        }
    }

}