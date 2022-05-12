<?php

namespace Source\Sorting\Types;

use Source\Sorting\ParentAlgoritm;

class Vertically extends ParentAlgoritm
{
    function __construct(
        array $inputArray,
        int $sizeOfArray
    ) {
        parent::__construct(
            self::VERTICAL_ALGORITM,
            $inputArray,
            $sizeOfArray
        );
    }

    public function sortArray(): void
    {
        for ($secondIndex = 0; $secondIndex < $this->sizeOfArray; $secondIndex++) {
            for ($firstIndex = 0; $firstIndex < $this->sizeOfArray; $firstIndex++) {
                $this->outputArray[$firstIndex][$secondIndex] = $this->diffArray[$this->count];
                $this->count++;
            }
        }
    }
}