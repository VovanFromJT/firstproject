<?php

namespace Source\Helper;

class DiffArray
{
    public function sortDiff(array $inputArray): array
    {
        $diffArray = call_user_func_array(
            'array_merge',
            $inputArray
        );
        sort($diffArray);
        return $diffArray;
    }
}