<?php

namespace Source\Source;
use Source\Interfaces\Output;

class OutputOnScreen implements Output
{
    public function OutputArray(array $outputArray, int $sizeOfArray, string $name)
    {
        echo "${name}:<br>";
        for ($i = 0; $i < $sizeOfArray; $i++)
        {
            for ($j = 0; $j < $sizeOfArray; $j++)
            {
                echo $outputArray[$i][$j]."\t\t";
            }
            echo "<br>";
        }
        echo "<br>";
    }
}