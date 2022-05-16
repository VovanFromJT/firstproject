<?php

namespace Source\Output;

use Source\Interfaces\IOutput;
use Source\Traits\DBConnector;

class OutputInJson implements IOutput
{
    use DBConnector;

    public function outputArray(
        array $outputArray,
        int $sizeOfArray,
        string $name,
        array $inputArray
    ) {
        $jsonArray = [
            $name,
            $inputArray,
            $outputArray,
            date("H:i:s")
        ];
        $this->callDBConnection($jsonArray);
    }
}