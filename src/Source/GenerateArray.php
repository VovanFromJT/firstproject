<?php

namespace Source\Source;

class GenerateArray
{
	public function Generate(int $sizeOfArray): array
    {
        for ($firstIndex=0; $firstIndex<$sizeOfArray; $firstIndex++)
        {
            for ($secondIndex=0; $secondIndex<$sizeOfArray; $secondIndex++)
            {
                $inputArray[$firstIndex][$secondIndex] = rand(0, $sizeOfArray*$sizeOfArray);
            }
        }
        if (!empty($inputArray)) {
            return $inputArray;
        }
        else{
            return $this->Generate($sizeOfArray);
        }
	}
}
?>