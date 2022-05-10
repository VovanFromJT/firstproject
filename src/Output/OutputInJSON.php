<?php

namespace Source\Output;

use Source\Interfaces\IOutput;

class OutputInJSON implements IOutput
{
    public function outputArray(
        array $outputArray,
        int $sizeOfArray,
        string $name,
        array $inputArray
    ) {
        $jsonArray = [
            $name,
            $inputArray,
            $outputArray,
            date("H:i:s")
        ];

        return $jsonArray;
    }
}