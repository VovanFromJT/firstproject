<?php

namespace Source\Source;
use Source\Interfaces\CallOthers;
use Source\Interfaces\Sort;

class Snail implements Sort, CallOthers
{
    private string $name = "Snail";
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
        $flag = "right";
        $firstMin = $secondMin = $count = 0;
        $firstMax = $secondMax = $sizeOfArray-1;
        $this->CallDiffArray();
        while ($count<$sizeOfArray*$sizeOfArray)
        {
            switch ($flag)
            {
                case "right":
                    $firstIndex = $firstMin;
                    for ($secondIndex=$secondMin; $secondIndex<=$secondMax; $secondIndex++)
                    {
                        if (empty($this->outputArray[$firstIndex][$secondIndex])) {
                            $this->outputArray[$firstIndex][$secondIndex] = $this->diffArray[$count];
                            $count++;
                        }
                    }
                    $firstMin++;
                    $flag = "down";
                    break;
                case "down":
                    $secondIndex = $secondMax;
                    for ($firstIndex=$firstMin; $firstIndex<=$firstMax; $firstIndex++)
                    {
                        if (empty($this->outputArray[$firstIndex][$secondIndex])) {
                            $this->outputArray[$firstIndex][$secondIndex] = $this->diffArray[$count];
                            $count++;
                        }
                    }
                    $secondMax--;
                    $flag = "left";
                    break;
                case "left":
                    $firstIndex = $firstMax;
                    for ($secondIndex=$secondMax; $secondIndex>=$secondMin; $secondIndex--)
                    {
                        if (empty($this->outputArray[$firstIndex][$secondIndex])) {
                            $this->outputArray[$firstIndex][$secondIndex] = $this->diffArray[$count];
                            $count++;
                        }
                    }
                    $firstMax--;
                    $flag = "up";
                    break;
                case "up":
                    $secondIndex = $secondMin;
                    for ($firstIndex=$firstMax; $firstIndex>=$firstMin; $firstIndex--)
                    {
                        if (empty($this->outputArray[$firstIndex][$secondIndex])) {
                            $this->outputArray[$firstIndex][$secondIndex] = $this->diffArray[$count];
                            $count++;
                        }
                    }
                    $secondMin++;
                    $flag = "right";
                    break;
            }
        }
        $this->CallOutput();
    }
}