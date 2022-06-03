<?php

namespace App\Models\Writers;

interface IWrite
{
    public function writeArray(array $outputArray, int $sizeOfArray, array $inputArray, string $name);
}
