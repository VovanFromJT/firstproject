<?php

namespace Source\Source;
use Source\Interfaces\Output;

class OutputInTxt implements Output
{
    public function OutputArray(array $outputArray, int $sizeOfArray, string $name)
    {
        $file = fopen("files/outputArray${name}.txt", "w");
        for ($i = 0; $i < $sizeOfArray; $i++)
        {
            for ($j = 0; $j < $sizeOfArray; $j++)
            {
                fwrite($file, $outputArray[$i][$j]."\t");
            }
            fwrite($file, "\n");
        }

        fclose($file);
    }
}