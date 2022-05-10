<?php

namespace Source\Sorting\Types;

use Source\Sorting\ParentAlgoritm;

class Snail extends ParentAlgoritm
{
    function __construct(
        array $inputArray,
        int $sizeOfArray
    ) {
        parent::__construct(
            self::SNAIL_ALGORITM,
            $inputArray,
            $sizeOfArray
        );
    }

    public function sorting(): void
    {
        $flag = "right";
        $firstMin = $secondMin = 0;
        $firstMax = $secondMax = $this->sizeOfArray-1;

        $this->diffArray = $this->sortDiff($this->inputArray);

        while ($this->count < $this->sizeOfArray * $this->sizeOfArray) {
            switch ($flag) {
                case "right":
                    $firstIndex = $firstMin;
                    for ($secondIndex = $secondMin; $secondIndex <= $secondMax; $secondIndex++) {
                        if (empty($this->outputArray[$firstIndex][$secondIndex])) {
                            $this->outputArray[$firstIndex][$secondIndex] = $this->diffArray[$this->count];
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
                            $this->outputArray[$firstIndex][$secondIndex] = $this->diffArray[$this->count];
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
                            $this->outputArray[$firstIndex][$secondIndex] = $this->diffArray[$this->count];
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
                            $this->outputArray[$firstIndex][$secondIndex] = $this->diffArray[$this->count];
                            $this->count++;
                        }
                    }
                    $secondMin++;
                    $flag = "right";
                    break;
            }
        }
        $this->callOutput();
    }
}