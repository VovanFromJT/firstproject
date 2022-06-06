<?php

namespace App\Models\Arrays;

use App\Models\Writers\Writer;

abstract class Sorter implements ISort, IGetOutputArray
{
    protected string $name;
    protected int $sizeOfArray;
    protected int $count = 0;
    protected array $outputArray;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    abstract public function sortArray(int $sizeOfArray, array $diffArray): void;

    public function getOutputArray(array $inputArray): array
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
