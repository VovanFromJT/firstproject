<?php

namespace Source\Traits;

trait Generator
{
    public function generateArray(): void
    {
        for ($firstIndex = 0; $firstIndex < $this->sizeOfArray; $firstIndex++) {
            for ($secondIndex = 0; $secondIndex < $this->sizeOfArray; $secondIndex++) {
                $this->inputArray[$firstIndex][$secondIndex] = rand(0, $this->sizeOfArray * $this->sizeOfArray);
            }
        }
        $this->diffArray = call_user_func_array(
            'array_merge',
            $this->inputArray
        );
        sort($this->diffArray);
    }
}