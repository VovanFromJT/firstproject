<?php

namespace Source\Source;

class CallMethods
{
    public function __construct($sizeOfArray)
    {
        $gen = new GenerateArray;
        $inputArray = $gen->Generate($sizeOfArray);
        $horizontal = new Horizontally;
        $horizontal->Sorting($inputArray,$sizeOfArray);
        $vertical = new Vertically;
        $vertical->Sorting($inputArray,$sizeOfArray);
        $snake = new Snake;
        $snake->Sorting($inputArray,$sizeOfArray);
        $snail = new Snail();
        $snail->Sorting($inputArray, $sizeOfArray);
    }
}