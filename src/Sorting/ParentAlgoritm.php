<?php

namespace Source\Sorting;

use Source\Output\OutputInJson;
use Source\Output\OutputInTxt;
use Source\Output\OutputOnScreen;
use Source\Traits\DBConnector;
use Source\Traits\Merger;
use Source\Traits\Outputer;

abstract class ParentAlgoritm
{
    use Merger, DBConnector, Outputer;

    private object $txt;
    private object $screen;
    private object $json;

    private string $name;
    protected int $sizeOfArray;
    protected int $count = 0;
    protected array $diffArray;
    protected array $jsonArray;
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

       $this->txt = new OutputInTxt();
       $this->screen = new OutputOnScreen();
       $this->json = new OutputInJson();
    }

    abstract protected function sortArray(): void;

}