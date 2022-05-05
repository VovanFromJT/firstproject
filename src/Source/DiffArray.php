<?php

namespace Source\Source;
use Source\Interfaces\Sort;

class DiffArray implements Sort
{
    public function Sorting(array $inputArray, int $sizeOfArray)
    {
        $diffArray = call_user_func_array('array_merge', $inputArray);
        sort($diffArray);
        return $diffArray;
    }
}