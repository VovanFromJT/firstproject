<?php

namespace Source\Source;

class GenerateArray
{
	public function Generate(int $sizeOfArray): array
    {
        for ($i=0; $i<$sizeOfArray; $i++)
        {
            for ($j=0; $j<$sizeOfArray; $j++)
            {
                $inputArray[$i][$j] = rand(0, $sizeOfArray*$sizeOfArray);
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