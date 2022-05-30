<?php

namespace Source\Sorting\Types;

use Source\Sorting\ParentAlgoritm;

class Vertically extends ParentAlgoritm
{
    public function __construct(string $name) {
        parent::__construct($name);
    }

    public function sortArray(int $sizeOfArray, array $diffArray): void
    {
        $this->sizeOfArray = $sizeOfArray;
        for ($secondIndex = 0; $secondIndex < $this->sizeOfArray; $secondIndex++) {
            for ($firstIndex = 0; $firstIndex < $this->sizeOfArray; $firstIndex++) {
                $this->outputArray[$firstIndex][$secondIndex] = $diffArray[$this->count];
                $this->count++;
            }
        }
    }
}