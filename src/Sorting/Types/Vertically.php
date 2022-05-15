<?php

namespace Source\Sorting\Types;

use Source\Sorting\ParentAlgoritm;

class Vertically extends ParentAlgoritm
{
    function __construct(
        int $sizeOfArray,
        int $action
    ) {
        parent::__construct(
            self::VERTICAL_ALGORITM,
            $sizeOfArray,
            $action
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