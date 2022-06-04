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
            KindCase::Horizontal->name => new Horizontal($this->kindOfSort),
            KindCase::Vertical->name => new Vertical($this->kindOfSort),
            KindCase::Snake->name => new Snake($this->kindOfSort),
            KindCase::Diagonal->name => new Diagonal($this->kindOfSort),
            KindCase::Snail->name => new Snail($this->kindOfSort),
            default => throw new CustomException(CustomExceptionCase::InvalidKindSort)
        };
    }
}
