<?php

namespace Source\Interfaces;

interface ISort
{
    public function sortArray(int $sizeOfArray, array $diffArray): void;

    public function callOutput(array $inputArray, string $action): void;
}