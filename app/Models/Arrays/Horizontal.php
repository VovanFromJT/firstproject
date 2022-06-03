<?php

namespace App\Models\Arrays;

class Horizontal extends Sorter
{
    public function __construct(string $name)
    {
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
