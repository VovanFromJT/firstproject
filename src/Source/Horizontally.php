<?php

namespace Source\Source;
use Source\Interfaces\Sort;

class Horizontally implements Sort
{
    public function Sorting(array $inputArray, int $sizeOfArray)
    {
        $name = "Horizontal";
        $diff = new DiffArray;
        $diffArray = $diff->Sorting($inputArray, $sizeOfArray);
        $outputArray = array();
        $count = 0;
        echo "Horizontally:<br>";
        for ($firstIndex=0; $firstIndex<$sizeOfArray; $firstIndex++)
        {
            for ($secondIndex=0; $secondIndex<$sizeOfArray; $secondIndex++)
            {
                $outputArray[$firstIndex][$secondIndex] = $diffArray[$count];
                $count++;
            }
        }
        $txt = new OutputInTxt;
        $screen = new OutputOnScreen;
        $txt->OutputArray($outputArray, $sizeOfArray, $name);
        $screen->OutputArray($outputArray, $sizeOfArray, $name);
    }
}