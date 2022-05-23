<?php

namespace Source\Output;

use Exception;

class WriterFile extends Write
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

    public function outputArray(): void {
        try {
            $file = fopen(
                "files/txt/" . $this->name . ".txt",
                "w"
            );
            for ($firstIndex = 0; $firstIndex < $this->sizeOfArray; $firstIndex++) {
                for ($secondIndex = 0; $secondIndex < $this->sizeOfArray; $secondIndex++) {
                    fwrite($file, $this->outputArray[$firstIndex][$secondIndex] . "\t");
                }
                fwrite($file, "\n");
            }
            fclose($file);
            echo "<a href='../../files/txt/$this->name.txt' download=''>$this->name.txt<a/>";
        }
        catch (Exception $e) {
            echo "Message: " . $e->getMessage();
        }
    }
}