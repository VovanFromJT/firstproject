<?php

namespace Source\Output;

use Source\Interfaces\IWrite;

abstract class Write implements IWrite
{
    protected array $outputArray;
    protected int $sizeOfArray;
    protected string $name;
    protected array $inputArray;

    public function __construct(
        array $outputArray,
        int $sizeOfArray,
        string $name,
        array $inputArray
    ) {
        $this->outputArray = $outputArray;
        $this->sizeOfArray = $sizeOfArray;
        $this->name = $name;
        $this->inputArray = $inputArray;
    }

    abstract public function outputArray(): void;
}