<?php

namespace Source\Sorting\Types;

use Source\Sorting\ParentAlgoritm;

class Vertically extends ParentAlgoritm
{
    public function __construct(
        string $name,
        int $sizeOfArray,
        int $action
    ) {
        parent::__construct(
            $name,
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