<?php

namespace App\Services\Writers;

abstract class Writer implements IWrite
{
    abstract public function writeArray(array $outputArray, int $sizeOfArray, array $inputArray, string $name);
}
