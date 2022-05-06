<?php

namespace Source\Source;
use Source\Interfaces\CallOthers;
use Source\Interfaces\Sort;


class Horizontally implements Sort, CallOthers
{
    private string $name = "Horizontal";
    private int $sizeOfArray;
    public array $diffArray;
    public array $inputArray;
    public array $outputArray;

    public function CallDiffArray()
    {
        $diff = new DiffArray;
        $this->diffArray = $diff->SortDiff($this->inputArray);
    }

    public function CallOutput()
    {
        $txt = new OutputInTxt;
        $screen = new OutputOnScreen;
        $txt->OutputArray($this->outputArray, $this->sizeOfArray, $this->name);
        $screen->OutputArray($this->outputArray, $this->sizeOfArray, $this->name);
    }

    public function Sorting(array $inputArray, int $sizeOfArray)
    {
        $this->inputArray = $inputArray;
        $this->sizeOfArray = $sizeOfArray;
        $count = 0;
        $this->CallDiffArray();
        for ($firstIndex=0; $firstIndex<$sizeOfArray; $firstIndex++)
        {
            for ($secondIndex=0; $secondIndex<$sizeOfArray; $secondIndex++)
            {
                $this->outputArray[$firstIndex][$secondIndex] = $this->diffArray[$count];
                $count++;
            }
        }
        $this->CallOutput();
    }
}