<?php

namespace Source\Source;

use Source\Interfaces\Sort;

class Horizontally extends ParentAlgoritm implements Sort
{
    function __construct(array $inputArray, int $sizeOfArray)
    {
        parent::__construct(self::HORIZONTAL_ALGORITM, $inputArray, $sizeOfArray);
    }

    public function sorting()
    {
        $count = 0;
        $this->callDiffArray();
        for ($firstIndex=0; $firstIndex<$this->sizeOfArray; $firstIndex++)
        {
            for ($secondIndex=0; $secondIndex<$this->sizeOfArray; $secondIndex++)
            {
                $this->outputArray[$firstIndex][$secondIndex] = $this->diffArray[$count];
                $count++;
            }
        }
        $this->callOutput();
    }
}