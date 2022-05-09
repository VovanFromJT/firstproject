<?php

namespace Source\EntPoint;

use Source\Helper\GenerateArray;
use Source\Sorting\Types\Diagonal;
use Source\Sorting\Types\Horizontally;
use Source\Sorting\Types\Snail;
use Source\Sorting\Types\Snake;
use Source\Sorting\Types\Vertically;

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

    /**
     * @var GenerateArray
     */
    protected static $generateArray;

    protected int $sizeOfArray;
    protected array $inputArray = array();

    public function __construct(int $sizeOfArray)
    {
        $this->sizeOfArray = $sizeOfArray;

        self::$generateArray = new GenerateArray($this->sizeOfArray);
        $this->inputArray = self::$generateArray->generate();

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

    public function callRun(): void
    {
        self::$horizontally->sorting();

        self::$vertically->sorting();

        self::$snake->sorting();

        self::$diagonal->sorting();

        self::$snail->sorting();
    }

}