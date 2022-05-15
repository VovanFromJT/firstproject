<?php

namespace Source\Sorting\Types;

use Source\Sorting\ParentAlgoritm;

class Snake extends ParentAlgoritm
{
    function __construct(
        int $sizeOfArray,
        int $action
    ) {
        parent::__construct(
            self::SNAKE_ALGORITM,
            $sizeOfArray,
            $action
        );
    }

    public function sortArray(): void
    {
        $flag = "right";
        $firstMin = 0;

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
    }
}