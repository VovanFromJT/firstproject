<?php

namespace App\Services\Writers;

class WriterDisplay extends Writer
{
    public function writeArray(array $outputArray, int $sizeOfArray, array $inputArray, string $name): array
    {
        return [
            "name" => $name,
            "outputArray" => $outputArray,
            "message" => 'Well done:)',
            "status" => 200,
        ];
    }
}



