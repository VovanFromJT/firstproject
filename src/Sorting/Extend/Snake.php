<?php

namespace Source\Sorting\Extend;

use Source\Interfaces\ISort;
use Source\Sorting\ParentAlgoritm;

class Snake extends ParentAlgoritm implements ISort
{
    function __construct(
        array $inputArray,
        int $sizeOfArray
    ) {
        parent::__construct(
            self::SNAKE_ALGORITM,
            $inputArray,
            $sizeOfArray
        );
    }

    public function sorting(): void
    {
        $flag = "right";
        $firstMin = $count = 0;

        $this->callDiffArray();

        while ($count<$this->sizeOfArray * $this->sizeOfArray) {
            switch ($flag) {
                case "right":
                    $firstIndex = $firstMin;
                    for ($secondIndex = 0; $secondIndex < $this->sizeOfArray; $secondIndex++) {
                        $this->outputArray[$firstIndex][$secondIndex] = $this->diffArray[$count];
                        $count++;
                    }
                    $firstMin++;
                    $flag = "left";
                    break;
                case "left":
                    $firstIndex = $firstMin;
                    for ($secondIndex = $this->sizeOfArray - 1; $secondIndex >= 0; $secondIndex--) {
                        $this->outputArray[$firstIndex][$secondIndex] = $this->diffArray[$count];
                        $count++;
                    }
                    $firstMin++;
                    $flag = "right";
                    break;
            }
        }
        $this->callOutput();
    }
}