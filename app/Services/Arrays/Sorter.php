<?php

namespace App\Services\Arrays;

abstract class Sorter implements ISort, IGetOutputArray
{
    protected int $count = 0;
    protected int $sizeOfArray;
    protected array $outputArray;

    abstract public function sortArray(int $sizeOfArray, array $diffArray);

    public function __construct(protected readonly string $name) {}

    public function getOutputArray(): array
    {
        return $this->outputArray;
    }

    protected function sortArrayKeys()
    {
        for ($index = 0; $index < $this->sizeOfArray; $index++) {
            ksort(
                $this->outputArray[$index],
                SORT_REGULAR
            );
        }
    }
}
