<?php

namespace App\Services\Arrays;

class Vertical extends Sorter
{
    public function __construct()
    {
        parent::__construct(__CLASS__);
    }

    public function sortArray(int $sizeOfArray, array $diffArray)
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
