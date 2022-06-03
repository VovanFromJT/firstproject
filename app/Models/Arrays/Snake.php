<?php

namespace App\Models\Arrays;

class Snake extends Sorter
{
    public function __construct(string $name)
    {
        parent::__construct($name);
    }

    public function sortArray(int $sizeOfArray, array $diffArray): void
    {
        $this->sizeOfArray = $sizeOfArray;
        $flag = "right";
        $firstMin = 0;

        while ($this->count<$this->sizeOfArray * $this->sizeOfArray) {
            switch ($flag) {
                case "right":
                    $firstIndex = $firstMin;
                    for ($secondIndex = 0; $secondIndex < $this->sizeOfArray; $secondIndex++) {
                        $this->outputArray[$firstIndex][$secondIndex] = $diffArray[$this->count];
                        $this->count++;
                    }
                $firstMin++;
                $flag = "left";
                break;
                case "left":
                    $firstIndex = $firstMin;
                    for ($secondIndex = $this->sizeOfArray - 1; $secondIndex >= 0; $secondIndex--) {
                        $this->outputArray[$firstIndex][$secondIndex] = $diffArray[$this->count];
                        $this->count++;
                    }
                $firstMin++;
                $flag = "right";
                break;
            }
        }
        $this->sortArrayKeys();
    }
}
