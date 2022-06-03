<?php

namespace App\Models\Writers;

use App\Models\ICreateProduct;
use Exception;

class WriterFactory implements ICreateProduct
{
    private const SORT = "sort";
    private const FILE = "file";
    private const DB = "db";

    private string $action;

    public function __construct(string $action)
    {
        $this->action = $action;
    }

    /**
     * @throws Exception
     */
    public function createProduct(): Writer
    {
        return match ($this->action) {
            self::SORT => new WriterDisplay(),
            self::FILE => new WriterFile(),
            self::DB => new WriterDB(),
            default => throw new Exception('Invalid action:(')
        };
    }
}
