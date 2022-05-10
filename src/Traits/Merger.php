<?php

namespace Source\Traits;

trait Merger
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