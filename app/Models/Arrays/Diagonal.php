<?php

namespace App\Models\Arrays;

class Diagonal extends Sorter
{
    public function __construct(string $name)
    {
        parent::__construct($name);
    }

    public function sortArray(int $sizeOfArray, array $diffArray): void
    {
        $this->sizeOfArray = $sizeOfArray;
        $flag = "right-up";
        $firstMin = $secondMin = $firstPosition = $secondPosition = 0;

        while ($this->count < $this->sizeOfArray * $this->sizeOfArray) {
            switch ($flag) {
                case "right-up":
                    $firstIndex = $firstMin;
                    $secondIndex = $secondMin;
                    $this->outputArray[$firstIndex][$secondIndex] = $diffArray[$this->count];
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
