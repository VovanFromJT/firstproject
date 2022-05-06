<?php

namespace Source\Source;

use Source\Interfaces\Sort;

class Diagonal extends ParentAlgoritm implements Sort
{
    function __construct(array $inputArray, int $sizeOfArray)
    {
        parent::__construct(self::DIAGONAL_ALGORITM, $inputArray, $sizeOfArray);
    }

    public function sorting()
    {

        $this->callDiffArray();
        $flag = "right-up";
        $firstMin = $secondMin = $firstPosition = $secondPosition = $count = 0;

        while ($count< $this->sizeOfArray * $this->sizeOfArray)
        {
            switch ($flag)
            {
                case "right-up":
                {
                    $firstIndex = $firstMin;
                    $secondIndex = $secondMin;
                    $this->outputArray[$firstIndex][$secondIndex] = $this->diffArray[$count];
                    $count++;
                    if ($firstIndex == 0 && $secondIndex != $this->sizeOfArray-1)
                    {
                        $flag = "down";
                        break;
                    }elseif ($secondIndex == $this->sizeOfArray-1)
                    {
                        $flag = "right";
                        break;
                    }else
                    {
                        $firstMin--;
                        $secondMin++;
                        break;
                    }
                }
                case "down":
                {
                    $firstPosition++;
                    $firstMin = $firstPosition;
                    $secondMin = $secondPosition;
                    $flag = "right-up";
                    break;
                }
                case "right":
                {
                    $secondPosition++;
                    $secondMin = $secondPosition;
                    $firstMin = $firstPosition;
                    $flag = "right-up";
                    break;
                }
            }
        }
        $this->callOutput();
    }
}