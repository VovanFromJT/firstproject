<?php

namespace Source\Sorting\Types;

use Source\Sorting\ParentAlgoritm;

class Snake extends ParentAlgoritm
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
        $firstMin = 0;

        $this->diffArray = $this->sortDiff($this->inputArray);

        while ($this->count<$this->sizeOfArray * $this->sizeOfArray) {
            switch ($flag) {
                case "right":
                    $firstIndex = $firstMin;
                    for ($secondIndex = 0; $secondIndex < $this->sizeOfArray; $secondIndex++) {
                        $this->outputArray[$firstIndex][$secondIndex] = $this->diffArray[$this->count];
                        $this->count++;
                    }
                    $firstMin++;
                    $flag = "left";
                    break;
                case "left":
                    $firstIndex = $firstMin;
                    for ($secondIndex = $this->sizeOfArray - 1; $secondIndex >= 0; $secondIndex--) {
                        $this->outputArray[$firstIndex][$secondIndex] = $this->diffArray[$this->count];
                        $this->count++;
                    }
                    $firstMin++;
                    $flag = "right";
                    break;
            }
        }
        $this->callOutput();
    }
}