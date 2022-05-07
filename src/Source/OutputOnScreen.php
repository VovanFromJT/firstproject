<?php

namespace Source\Source;
use Source\Interfaces\Output;

class OutputOnScreen implements Output
{
    public function outputArray(array $outputArray, int $sizeOfArray, string $name)
    {
        echo "<p><br>${name}:<br></p>";
        echo "<p><table>";
        for ($firstIndex = 0; $firstIndex < $sizeOfArray; $firstIndex++)
        {
            echo "<tr>";
            for ($secondIndex = 0; $secondIndex < $sizeOfArray; $secondIndex++)
            {
                echo "<td>".$outputArray[$firstIndex][$secondIndex]."</td>";
            }
            echo "</tr>";
        }
        echo "</table></p>";

    }
}
?>



