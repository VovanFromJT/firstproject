<?php

namespace Source\Sorting\Types;

use Source\Sorting\ParentAlgoritm;

class Diagonal extends ParentAlgoritm
{
    function __construct(
        int $sizeOfArray,
        int $action
    ) {
        parent::__construct(
            self::DIAGONAL_ALGORITM,
            $sizeOfArray,
            $action
        );
    }

    public function sortArray(): void
    {
        $flag = "right-up";
        $firstMin = $secondMin = $firstPosition = $secondPosition = 0;

        while ($this->count < $this->sizeOfArray * $this->sizeOfArray) {
            switch ($flag) {
                case "right-up":
                    $firstIndex = $firstMin;
                    $secondIndex = $secondMin;
                    $this->outputArray[$firstIndex][$secondIndex] = $this->diffArray[$this->count];
                    $this->count++;
                    if (
                        $firstIndex == 0
                        && $secondIndex != $this->sizeOfArray - 1
                    ) {
                        $flag = "down";
                    } elseif ($secondIndex == $this->sizeOfArray - 1) {
                        $flag = "right";
                    } else {
                        $firstMin--;
                        $secondMin++;
                    }
                    break;
                case "down":
                    $firstPosition++;
                    $firstMin = $firstPosition;
                    $secondMin = $secondPosition;
                    $flag = "right-up";
                    break;
                case "right":
                    $secondPosition++;
                    $secondMin = $secondPosition;
                    $firstMin = $firstPosition;
                    $flag = "right-up";
                    break;
            }
        }
    }
}