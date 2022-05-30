<?php

namespace Source\Sorting\Types;

use Source\Sorting\ParentAlgoritm;

class Snail extends ParentAlgoritm
{
    public function __construct(string $name) {
        parent::__construct($name);
    }

    public function sortArray(int $sizeOfArray, array $diffArray): void
    {
        $this->sizeOfArray = $sizeOfArray;
        $flag = "right";
        $firstMin = $secondMin = 0;
        $firstMax = $secondMax = $this->sizeOfArray - 1;

        while ($this->count < $this->sizeOfArray * $this->sizeOfArray) {
            switch ($flag) {
                case "right":
                    $firstIndex = $firstMin;
                    for ($secondIndex = $secondMin; $secondIndex <= $secondMax; $secondIndex++) {
                        if (empty($this->outputArray[$firstIndex][$secondIndex])) {
                            $this->outputArray[$firstIndex][$secondIndex] = $diffArray[$this->count];
                            $this->count++;
                        }
                    }
                    $firstMin++;
                    $flag = "down";
                    break;
                case "down":
                    $secondIndex = $secondMax;
                    for ($firstIndex = $firstMin; $firstIndex <= $firstMax; $firstIndex++) {
                        if (empty($this->outputArray[$firstIndex][$secondIndex])) {
                            $this->outputArray[$firstIndex][$secondIndex] = $diffArray[$this->count];
                            $this->count++;
                        }
                    }
                    $secondMax--;
                    $flag = "left";
                    break;
                case "left":
                    $firstIndex = $firstMax;
                    for ($secondIndex = $secondMax; $secondIndex >= $secondMin; $secondIndex--) {
                        if (empty($this->outputArray[$firstIndex][$secondIndex])) {
                            $this->outputArray[$firstIndex][$secondIndex] = $diffArray[$this->count];
                            $this->count++;
                        }
                    }
                    $firstMax--;
                    $flag = "up";
                    break;
                case "up":
                    $secondIndex = $secondMin;
                    for ($firstIndex = $firstMax; $firstIndex >= $firstMin; $firstIndex--) {
                        if (empty($this->outputArray[$firstIndex][$secondIndex])) {
                            $this->outputArray[$firstIndex][$secondIndex] = $diffArray[$this->count];
                            $this->count++;
                        }
                    }
                    $secondMin++;
                    $flag = "right";
                    break;
            }
        }
    }
}