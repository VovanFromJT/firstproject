<?php

namespace App\Models\Arrays;

use App\Exceptions\CustomException;
use App\Exceptions\CustomExceptionCase;
use App\Models\AbstractFactory;
use Exception;

class SorterFactory extends AbstractFactory
{
    public function __construct(string $kindOfSort)
    {
        $this->kindOfSort = $kindOfSort;
    }

    /**
     * @throws Exception
     */
    public function createProduct(): Sorter
    {
        return match ($this->kindOfSort) {
            SorterFactoryCase::Horizontal->name => new Horizontal($this->kindOfSort),
            SorterFactoryCase::Vertical->name   => new Vertical($this->kindOfSort),
            SorterFactoryCase::Snake->name      => new Snake($this->kindOfSort),
            SorterFactoryCase::Diagonal->name   => new Diagonal($this->kindOfSort),
            SorterFactoryCase::Snail->name      => new Snail($this->kindOfSort),
            default => throw new CustomException(CustomExceptionCase::InvalidKindSort)
        };
    }
}
