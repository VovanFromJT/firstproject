<?php

namespace Source\Source;
use Source\Interfaces\Sort;

class Diagonal implements Sort
{
    public function Sorting(array $inputArray, int $sizeOfArray)
    {
        $name = "Diagonal";
        $diff = new DiffArray;
        $diffArray = $diff->Sorting($inputArray, $sizeOfArray);
        $outputArray = array();
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
                    $outputArray[$firstIndex][$secondIndex] = $diffArray[$count];
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
        $txt = new OutputInTxt;
        $screen = new OutputOnScreen;
        $txt->OutputArray($outputArray, $sizeOfArray, $name);
        $screen->OutputArray($outputArray, $sizeOfArray, $name);
    }
}