<?php

namespace Source\Source;

class CallMethods
{
    public int $sizeOfArray;

    public function __construct(int $sizeOfArray)
    {
        $this->sizeOfArray = $sizeOfArray;
    }

    public function callGenerate()
    {
        $gen = new GenerateArray;
        $inputArray = $gen->generate($this->sizeOfArray);
        $this->callRun($inputArray);
    }

    public function callRun(array $inputArray)
    {
        $horizontal = new Horizontally($inputArray,$this->sizeOfArray);
        $vertical = new Vertically($inputArray,$this->sizeOfArray);
        $snake = new Snake($inputArray,$this->sizeOfArray);
        $diagonal = new Diagonal($inputArray,$this->sizeOfArray);
        $snail = new Snail($inputArray,$this->sizeOfArray);

        $horizontal->sorting();
        $vertical->sorting();
        $snake->sorting();
        $diagonal->sorting();
        $snail->sorting();
    }

}