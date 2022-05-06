<?php

namespace Source\Source;

use Source\Interfaces\Sort;

class Vertically extends ParentAlgoritm implements Sort
{
    function __construct(array $inputArray, int $sizeOfArray)
    {
        parent::__construct(self::VERTICAL_ALGORITM, $inputArray, $sizeOfArray);
    }

    public function sorting()
    {
        $count = 0;
        $this->callDiffArray();
        for ($secondIndex=0; $secondIndex<$this->sizeOfArray; $secondIndex++)
        {
            for ($firstIndex=0; $firstIndex<$this->sizeOfArray; $firstIndex++)
            {
                $this->outputArray[$firstIndex][$secondIndex] = $this->diffArray[$count];
                $count++;
            }
        }
        $this->callOutput();
    }
}