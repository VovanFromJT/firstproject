<?php

namespace Source\Source;
use Source\Interfaces\CallOthers;
use Source\Interfaces\Sort;

class Diagonal implements Sort, CallOthers
{
    private string $name = "Diagonal";
    private int $sizeOfArray;
    public array $diffArray;
    public array $inputArray;
    public array $outputArray;

    public function CallDiffArray()
    {
        $diff = new DiffArray;
        $this->diffArray = $diff->Sorting($this->inputArray, $this->sizeOfArray);
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
        $this->CallDiffArray();
        $flag = "right-up";
        $firstMin = $secondMin = $firstPosition = $secondPosition = $count = 0;

        while ($count<$sizeOfArray*$sizeOfArray)
        {
            switch ($flag)
            {
                case "right-up":
                {
                    $firstIndex = $firstMin;
                    $secondIndex = $secondMin;
                    $this->outputArray[$firstIndex][$secondIndex] = $this->diffArray[$count];
                    $count++;
                    if ($firstIndex == 0 && $secondIndex != $sizeOfArray-1)
                    {
                        $flag = "down";
                        break;
                    }elseif ($secondIndex == $sizeOfArray-1)
                    {
                        $flag = "right";
                        break;
                    }else
                    {
                        $firstMin--;
                        $secondMin++;
                        break;
                    }
                }
                case "down":
                {
                    $firstPosition++;
                    $firstMin = $firstPosition;
                    $secondMin = $secondPosition;
                    $flag = "right-up";
                    break;
                }
                case "right":
                {
                    $secondPosition++;
                    $secondMin = $secondPosition;
                    $firstMin = $firstPosition;
                    $flag = "right-up";
                    break;
                }
            }
        }
        $this->CallOutput();
    }
}