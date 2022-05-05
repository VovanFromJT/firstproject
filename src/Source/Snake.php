<?php

namespace Source\Source;
use Source\Interfaces\Sort;

class Snake implements Sort
{
    public function Sorting(array $inputArray, int $sizeOfArray)
    {
        $name = "Snake";
        $diff = new DiffArray;
        $diffArray = $diff->Sorting($inputArray, $sizeOfArray);
        $outputArray = array();
        $flag = "right";
        $firstMin = $count = 0;
        echo "Snake:<br>";
        while ($count<$sizeOfArray*$sizeOfArray)
        {
            switch ($flag)
            {
                case "right":
                {
                    $firstIndex = $firstMin;
                    for ($secondIndex=0; $secondIndex<$sizeOfArray; $secondIndex++)
                    {
                        $outputArray[$firstIndex][$secondIndex] = $diffArray[$count];
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
                        $outputArray[$firstIndex][$secondIndex] = $diffArray[$count];
                        $count++;
                    }
                    $firstMin++;
                    $flag = "right";
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