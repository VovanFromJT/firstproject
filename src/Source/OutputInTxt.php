<?php

namespace Source\Source;
use Source\Interfaces\Output;

class OutputInTxt implements Output
{
    public function OutputArray(array $outputArray, int $sizeOfArray, string $name)
    {
        $file = fopen("files/outputArray${name}.txt", "w");
        for ($firstIndex = 0; $firstIndex < $sizeOfArray; $firstIndex++)
        {
            for ($secondIndex = 0; $secondIndex < $sizeOfArray; $secondIndex++)
            {
                fwrite($file, $outputArray[$firstIndex][$secondIndex]."\t");
            }
            fwrite($file, "\n");
        }

        fclose($file);
    }
}