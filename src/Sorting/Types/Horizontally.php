<?php

namespace Source\Sorting\Types;

use Source\Sorting\ParentAlgoritm;

class Horizontally extends ParentAlgoritm
{
    public function __construct(string $name) {
        parent::__construct($name);
    }

    public function sortArray(int $sizeOfArray, array $diffArray): void
    {
        $this->sizeOfArray = $sizeOfArray;
        for ($firstIndex = 0; $firstIndex < $this->sizeOfArray; $firstIndex++) {
            for ($secondIndex = 0; $secondIndex < $this->sizeOfArray; $secondIndex++) {
                $this->outputArray[$firstIndex][$secondIndex] = $diffArray[$this->count];
                $this->count++;
            }
        }
    }
}