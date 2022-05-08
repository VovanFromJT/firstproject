<?php

namespace Source\Helper;

class GenerateArray
{
    protected int $sizeOfArray;

    function __construct(int $sizeOfArray)
    {
        $this->sizeOfArray = $sizeOfArray;
    }

	public function generate(): array
    {
        $inputArray = array();
        for ($firstIndex = 0; $firstIndex < $this->sizeOfArray; $firstIndex++) {
            for ($secondIndex = 0; $secondIndex < $this->sizeOfArray; $secondIndex++) {
                $inputArray[$firstIndex][$secondIndex] = rand(0, $this->sizeOfArray * $this->sizeOfArray);
            }
        }
        return $inputArray;
	}
}