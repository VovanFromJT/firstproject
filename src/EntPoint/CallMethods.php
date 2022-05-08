<?php

namespace Source\EntPoint;

use Source\Helper\GenerateArray;
use Source\Sorting\Extend\Diagonal;
use Source\Sorting\Extend\Horizontally;
use Source\Sorting\Extend\Snail;
use Source\Sorting\Extend\Snake;
use Source\Sorting\Extend\Vertically;

class CallMethods
{
    /**
     * @var Horizontally
     */
    protected static $horizontally;

    /**
     * @var Vertically
     */
    protected static $vertically;

    /**
     * @var Snake
     */
    protected static $snake;

    /**
     * @var Diagonal
     */
    protected static $diagonal;

    /**
     * @var Snail
     */
    protected static $snail;

    protected int $sizeOfArray;
    protected array $inputArray = array();

    public function __construct(int $sizeOfArray)
    {
        $this->sizeOfArray = $sizeOfArray;

        self::$horizontally = new Horizontally(
            $this->inputArray,
            $this->sizeOfArray
        );

        self::$vertically = new Vertically(
            $this->inputArray,
            $this->sizeOfArray
        );

        self::$snake = new Snake(
            $this->inputArray,
            $this->sizeOfArray
        );

        self::$diagonal = new Diagonal(
            $this->inputArray,
            $this->sizeOfArray
        );

        self::$snail = new Snail(
            $this->inputArray,
            $this->sizeOfArray
        );
    }

    public function callGenerate(): void
    {
        $gen = new GenerateArray;
        $this->inputArray = $gen->generate($this->sizeOfArray);
        $this->callRun($this->inputArray);
    }

    public function callRun(array $inputArray): void {
        $horizontal = new Horizontally(
            $inputArray,
            $this->sizeOfArray
        );
        $vertical = new Vertically(
            $inputArray,
            $this->sizeOfArray
        );
        $snake = new Snake(
            $inputArray,
            $this->sizeOfArray
        );
        $diagonal = new Diagonal(
            $inputArray,
            $this->sizeOfArray
        );
        $snail = new Snail(
            $inputArray,
            $this->sizeOfArray
        );

        $horizontal->sorting();
        $vertical->sorting();
        $snake->sorting();
        $diagonal->sorting();
        $snail->sorting();
    }

}