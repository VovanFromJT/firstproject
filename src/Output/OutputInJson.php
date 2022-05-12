<?php

namespace Source\Output;

use Source\Interfaces\IOutput;

class OutputInJson implements IOutput
{
    public function outputArray(
        array $outputArray,
        int $sizeOfArray,
        string $name,
        array $inputArray
    ): array {
        $jsonArray = [
            $name,
            $inputArray,
            $outputArray,
            date("H:i:s")
        ];

        return $jsonArray;
    }
}