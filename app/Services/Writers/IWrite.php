<?php

namespace App\Services\Writers;

interface IWrite
{
    public function writeArray(array $outputArray, int $sizeOfArray, array $inputArray, string $name);
}
