<?php

namespace App\Models\Writers;

class WriterDisplay extends Writer
{
    public function writeArray(array $outputArray, int $sizeOfArray, array $inputArray, string $name)
    {
        response(
            [
                "name" => $name,
                "outputArray" => $outputArray,
                "message" => 'Well done:)',
            ],
            200
        )->sendContent();
    }
}



