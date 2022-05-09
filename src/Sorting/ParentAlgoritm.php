<?php

namespace Source\Sorting;

use Source\Helper\DiffArray;
use Source\Interfaces\ICallOthers;
use Source\Output\OutputInTxt;
use Source\Output\OutputOnScreen;

class ParentAlgoritm implements ICallOthers
{
    /**
     * @var DiffArray
     */
    protected static $diff;

    /**
     * @var OutputInTxt
     */
    protected static $txt;

    /**
     * @var OutputOnScreen
     */
    protected static $screen;

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

       self::$diff = new DiffArray();
       self::$txt = new OutputInTxt();
       self::$screen = new OutputOnScreen();
    }

    public function callDiffArray(): void
    {
        $this->diffArray = self::$diff->sortDiff($this->inputArray);
    }

    public function callOutput(): void
    {
        self::$txt->outputArray(
            $this->outputArray,
            $this->sizeOfArray,
            $this->name
        );
        self::$screen->outputArray(
            $this->outputArray,
            $this->sizeOfArray,
            $this->name
        );
    }


}