<?php

namespace Source\Output;

class WriterDisplay extends Write
{
    public function __construct(
        array $outputArray,
        int $sizeOfArray,
        string $name,
        array $inputArray
    ) {
        parent::__construct(
            $outputArray,
            $sizeOfArray,
            $name,
            $inputArray
        );
    }

    public function outputArray(): void
    {
        echo "<p><br>$this->name:<br></p>";
        echo "<p><table>";
        for ($firstIndex = 0; $firstIndex < $this->sizeOfArray; $firstIndex++) {
            echo "<tr>";
            for ($secondIndex = 0; $secondIndex < $this->sizeOfArray; $secondIndex++) {
                echo "<td>" . $this->outputArray[$firstIndex][$secondIndex] . "</td>";
            }
            echo "</tr>";
        }
        echo "</table></p>";
    }
}



