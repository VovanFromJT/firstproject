<?php

namespace Source\Interfaces;

interface IOutput
{
    public function outputArray(
        array $outputArray,
        int $sizeOfArray,
        string $name
    ): void;
}