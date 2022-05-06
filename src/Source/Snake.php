<?php

namespace Source\Source;
use Source\Interfaces\CallOthers;
use Source\Interfaces\Sort;

class Snake implements Sort, CallOthers
{
    private string $name = "Snake";
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
        $flag = "right";
        $firstMin = $count = 0;
        $this->CallDiffArray();
        while ($count<$sizeOfArray*$sizeOfArray)
        {
            switch ($flag)
            {
                case "right":
                {
                    $firstIndex = $firstMin;
                    for ($secondIndex=0; $secondIndex<$sizeOfArray; $secondIndex++)
                    {
                        $this->outputArray[$firstIndex][$secondIndex] = $this->diffArray[$count];
                        $count++;
                    }
                    $firstMin++;
                    $flag = "left";
                    break;
                }
                case "left":
                {
                    $firstIndex = $firstMin;
                    for ($secondIndex=$sizeOfArray-1; $secondIndex>=0; $secondIndex--)
                    {
                        $this->outputArray[$firstIndex][$secondIndex] = $this->diffArray[$count];
                        $count++;
                    }
                    $firstMin++;
                    $flag = "right";
                    break;
                }
            }
        }
        $this->CallOutput();
    }
}