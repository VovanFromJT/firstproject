<?php

namespace Source\Source;

use Source\Interfaces\Sort;

class Snail extends ParentAlgoritm implements Sort
{
    function __construct(array $inputArray, int $sizeOfArray)
    {
        parent::__construct(self::SNAIL_ALGORITM, $inputArray, $sizeOfArray);
    }

    public function sorting()
    {
        $flag = "right";
        $firstMin = $secondMin = $count = 0;
        $firstMax = $secondMax = $this->sizeOfArray-1;
        $this->callDiffArray();
        while ($count<$this->sizeOfArray*$this->sizeOfArray)
        {
            switch ($flag)
            {
                case "right":
                    $firstIndex = $firstMin;
                    for ($secondIndex=$secondMin; $secondIndex<=$secondMax; $secondIndex++)
                    {
                        if (empty($this->outputArray[$firstIndex][$secondIndex])) {
                            $this->outputArray[$firstIndex][$secondIndex] = $this->diffArray[$count];
                            $count++;
                        }
                    }
                    $firstMin++;
                    $flag = "down";
                    break;
                case "down":
                    $secondIndex = $secondMax;
                    for ($firstIndex=$firstMin; $firstIndex<=$firstMax; $firstIndex++)
                    {
                        if (empty($this->outputArray[$firstIndex][$secondIndex])) {
                            $this->outputArray[$firstIndex][$secondIndex] = $this->diffArray[$count];
                            $count++;
                        }
                    }
                    $secondMax--;
                    $flag = "left";
                    break;
                case "left":
                    $firstIndex = $firstMax;
                    for ($secondIndex=$secondMax; $secondIndex>=$secondMin; $secondIndex--)
                    {
                        if (empty($this->outputArray[$firstIndex][$secondIndex])) {
                            $this->outputArray[$firstIndex][$secondIndex] = $this->diffArray[$count];
                            $count++;
                        }
                    }
                    $firstMax--;
                    $flag = "up";
                    break;
                case "up":
                    $secondIndex = $secondMin;
                    for ($firstIndex=$firstMax; $firstIndex>=$firstMin; $firstIndex--)
                    {
                        if (empty($this->outputArray[$firstIndex][$secondIndex])) {
                            $this->outputArray[$firstIndex][$secondIndex] = $this->diffArray[$count];
                            $count++;
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