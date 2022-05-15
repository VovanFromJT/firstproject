<?php

namespace Source\Output;

use Source\Interfaces\IOutput;

class OutputInTxt implements IOutput
{
    public function outputArray(
        array $outputArray,
        int $sizeOfArray,
        string $name,
        array $inputArray
    ): void {
        $file = fopen(
            "files/txt/" . $name . ".txt",
            "w"
        );
        for ($firstIndex = 0; $firstIndex < $sizeOfArray; $firstIndex++) {
            for ($secondIndex = 0; $secondIndex < $sizeOfArray; $secondIndex++) {
                fwrite($file, $outputArray[$firstIndex][$secondIndex]."\t");
            }
            fwrite($file, "\n");
        }

        fclose($file);
    }
}