<?php

namespace Source\Sorting\Types;

use Source\Sorting\ParentAlgoritm;

class Horizontally extends ParentAlgoritm
{
    function __construct(
        int $sizeOfArray,
        int $action
    ) {
        parent::__construct(
            self::HORIZONTAL_ALGORITM,
            $sizeOfArray,
            $action
        );
    }

    public function sortArray(): void
    {
        for ($firstIndex = 0; $firstIndex < $this->sizeOfArray; $firstIndex++) {
            for ($secondIndex = 0; $secondIndex < $this->sizeOfArray; $secondIndex++) {
                $this->outputArray[$firstIndex][$secondIndex] = $this->diffArray[$this->count];
                $this->count++;
            }
        }
    }
}