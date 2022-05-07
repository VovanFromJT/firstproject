<?php

namespace Source\Source;

class GenerateArray
{
	public function generate(int $sizeOfArray): array
    {
        $inputArray = array();
        for ($firstIndex = 0; $firstIndex < $sizeOfArray; $firstIndex++) {
            for ($secondIndex = 0; $secondIndex < $sizeOfArray; $secondIndex++) {
                $inputArray[$firstIndex][$secondIndex] = rand(0, $sizeOfArray * $sizeOfArray);
            }
        }
        return $inputArray;
	}
}