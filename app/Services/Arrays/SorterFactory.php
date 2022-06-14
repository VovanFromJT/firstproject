<?php

namespace App\Services\Arrays;

use App\Exceptions\CustomException;
use App\Exceptions\CustomExceptionCase;
use App\Services\AbstractFactory;
use Exception;

class SorterFactory extends AbstractFactory
{
    public function __construct(private readonly string $kindOfSort) {}

    /**
     * @throws Exception
     */
    public function createProduct(): Sorter
    {
        return match ($this->kindOfSort) {
            SorterFactoryCase::Horizontal->name => new Horizontal(),
            SorterFactoryCase::Vertical->name   => new Vertical(),
            SorterFactoryCase::Snake->name      => new Snake(),
            SorterFactoryCase::Diagonal->name   => new Diagonal(),
            SorterFactoryCase::Snail->name      => new Snail(),
            default => throw new CustomException(CustomExceptionCase::InvalidKindSort)
        };
    }
}
