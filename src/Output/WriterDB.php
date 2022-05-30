<?php

namespace Source\Output;

use Source\DBConnector\DBConnector;

class WriterDB extends Write
{
    use DBConnector;

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
        $jsonArray =  [
            $this->name,
            $this->inputArray,
            $this->outputArray,
            date("H:i:s"),
        ];

        if (empty($this->connection)) {
            $this->setConnect();
        }
        $this->newDbRecord($jsonArray);
    }
}