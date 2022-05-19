<?php

namespace Source\Sorting;

use Source\Helper\Generator;
use Source\Interfaces\ISort;
use Source\Output\WriterDB;
use Source\Output\WriterDisplay;
use Source\Output\WriterFile;

abstract class ParentAlgoritm implements ISort
{
    protected string $name;
    protected int $sizeOfArray;
    protected int $action;
    protected int $count = 0;
    protected array $diffArray;
    protected array $inputArray;
    protected array $outputArray;

    public function __construct(
        string $name,
        int $sizeOfArray,
        int $action
    ) {
       $this->name = $name;
       $this->sizeOfArray = $sizeOfArray;
       $this->action = $action;
    }

    public function generateArray(): void
    {
        $genArray = new Generator($this->sizeOfArray);
        [
            $this->diffArray,
            $this->inputArray
        ] = $genArray->generateArray();
    }

    public function callOutput(): void
    {
        switch ($this->action){
            case 0:
                $screen = new WriterDisplay(
                    $this->outputArray,
                    $this->sizeOfArray,
                    $this->name,
                    $this->inputArray
                );
                $screen->outputArray();
                break;
            case 1:
                $txt = new WriterFile(
                    $this->outputArray,
                    $this->sizeOfArray,
                    $this->name,
                    $this->inputArray
                );
                $txt->outputArray();
                break;
            case 2:
                $json = new WriterDB(
                    $this->outputArray,
                    $this->sizeOfArray,
                    $this->name,
                    $this->inputArray
                );
                $json->outputArray();
                break;
        }
    }
}