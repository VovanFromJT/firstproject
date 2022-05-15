<?php

namespace Source\Sorting;

use Source\Output\OutputInJson;
use Source\Output\OutputInTxt;
use Source\Output\OutputOnScreen;
use Source\Traits\Generator;
use Source\Traits\Outputer;
use Source\Traits\Runner;

abstract class ParentAlgoritm
{
    use Generator, Outputer, Runner;

    private object $txt;
    private object $screen;
    private object $json;

    private string $name;
    protected int $sizeOfArray;
    protected int $action;
    protected int $count = 0;
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
        int $sizeOfArray,
        int $action
    ) {
       $this->name = $name;
       $this->sizeOfArray = $sizeOfArray;
       $this->action = $action;

       $this->txt = new OutputInTxt();
       $this->screen = new OutputOnScreen();
       $this->json = new OutputInJson();
    }

    abstract protected function sortArray(): void;

}