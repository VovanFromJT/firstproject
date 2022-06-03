<?php

namespace App\Models\Arrays;

use App\Models\ICreateProduct;
use Exception;

class SorterFactory implements ICreateProduct
{
    private const HORIZONTAL_ALGORITM = "Horizontal";
    private const VERTICAL_ALGORITM = "Vertical";
    private const SNAKE_ALGORITM = "Snake";
    private const DIAGONAL_ALGORITM = "Diagonal";
    private const SNAIL_ALGORITM = "Snail";

    private string $kindOfSort;

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
            self::HORIZONTAL_ALGORITM => new Horizontal($this->kindOfSort),
            self::VERTICAL_ALGORITM => new Vertical($this->kindOfSort),
            self::SNAKE_ALGORITM => new Snake($this->kindOfSort),
            self::DIAGONAL_ALGORITM => new Diagonal($this->kindOfSort),
            self::SNAIL_ALGORITM => new Snail($this->kindOfSort),
            default => throw new Exception('Invalid kind of sort:(')
        };
    }
}
