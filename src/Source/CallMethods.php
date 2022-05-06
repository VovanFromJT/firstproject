<?php

namespace Source\Source;

class CallMethods
{
    public function __construct($sizeOfArray)
    {
        $gen = new GenerateArray;
        $horizontal = new Horizontally;
        $vertical = new Vertically;
        $snake = new Snake;
        $diagonal = new Diagonal;
        $snail = new Snail;

        $inputArray = $gen->Generate($sizeOfArray);
        $horizontal->Sorting($inputArray,$sizeOfArray);
        $vertical->Sorting($inputArray,$sizeOfArray);
        $snake->Sorting($inputArray,$sizeOfArray);
        $diagonal->Sorting($inputArray,$sizeOfArray);
        $snail->Sorting($inputArray, $sizeOfArray);
    }
}