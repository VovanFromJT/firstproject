<?php

namespace App\Models\Arrays;

interface ISort
{
    public function sortArray(int $sizeOfArray, array $diffArray): void;
}
