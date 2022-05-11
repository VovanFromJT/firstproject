<?php

namespace Source\Sorting\Types;

use Source\Sorting\ParentAlgoritm;

class Horizontally extends ParentAlgoritm
{
    function __construct(
        array $inputArray,
        int $sizeOfArray
    ) {
        parent::__construct(
            self::HORIZONTAL_ALGORITM,
            $inputArray,
            $sizeOfArray
        );
    }

    public function sorting(): void
    {
        for ($firstIndex = 0; $firstIndex < $this->sizeOfArray; $firstIndex++) {
            for ($secondIndex = 0; $secondIndex < $this->sizeOfArray; $secondIndex++) {
                $this->outputArray[$firstIndex][$secondIndex] = $this->diffArray[$this->count];
                $this->count++;
            }
        }
    }
}