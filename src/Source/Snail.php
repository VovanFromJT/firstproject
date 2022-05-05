<?php

namespace Source\Source;
use Source\Interfaces\Sort;

class Snail implements Sort
{
    public function Sorting(array $inputArray, int $sizeOfArray)
    {
        $name = "Snail";
        $diff = new DiffArray;
        $diffArray = $diff->Sorting($inputArray, $sizeOfArray);
        $outputArray = array();
        $flag = "right";
        $firstMin = $secondMin = $count = 0;
        $firstMax = $secondMax = $sizeOfArray-1;

        while ($count<$sizeOfArray*$sizeOfArray)
        {
            switch ($flag)
            {
                case "right":
                    $firstIndex = $firstMin;
                    for ($secondIndex=$secondMin; $secondIndex<=$secondMax; $secondIndex++)
                    {
                        if (empty($outputArray[$firstIndex][$secondIndex])) {
                            $outputArray[$firstIndex][$secondIndex] = $diffArray[$count];
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
                        if (empty($outputArray[$firstIndex][$secondIndex])) {
                            $outputArray[$firstIndex][$secondIndex] = $diffArray[$count];
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
                        if (empty($outputArray[$firstIndex][$secondIndex])) {
                            $outputArray[$firstIndex][$secondIndex] = $diffArray[$count];
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
                        if (empty($outputArray[$firstIndex][$secondIndex])) {
                            $outputArray[$firstIndex][$secondIndex] = $diffArray[$count];
                            $count++;
                        }
                    }
                    $secondMin++;
                    $flag = "right";
                    break;
            }
        }
        $txt = new OutputInTxt;
        $screen = new OutputOnScreen;
        $txt->OutputArray($outputArray, $sizeOfArray, $name);
        $screen->OutputArray($outputArray, $sizeOfArray, $name);
    }
}