<?php

namespace Source\Output;

use Source\Interfaces\IOutput;

class IOutputInTxt implements IOutput
{
    public function outputArray(
        array $outputArray,
        int $sizeOfArray,
        string $name
    ): void {
        $file = fopen(
            "files/outputArray$name.txt",
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