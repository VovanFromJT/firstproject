<?php

namespace Source\Source;

class DiffArray
{
    public function sortDiff(array $inputArray)
    {
        $diffArray = call_user_func_array('array_merge', $inputArray);
        sort($diffArray);
        return $diffArray;
    }
}