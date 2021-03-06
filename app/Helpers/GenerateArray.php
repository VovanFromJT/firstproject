<?php

namespace App\Helpers;

class GenerateArray
{
    public function __construct(private readonly int $sizeOfArray) {}

    public function generateArray(): array
    {
        $inputArray = [];
        for ($firstIndex = 0; $firstIndex < $this->sizeOfArray; $firstIndex++) {
            for ($secondIndex = 0; $secondIndex < $this->sizeOfArray; $secondIndex++) {
                $inputArray[$firstIndex][$secondIndex] = rand(0, $this->sizeOfArray * $this->sizeOfArray);
            }
        }
        $diffArray = call_user_func_array(
            'array_merge',
            $inputArray
        );
        sort($diffArray);
        return [$diffArray, $inputArray];
    }
}
