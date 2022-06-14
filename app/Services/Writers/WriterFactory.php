<?php

namespace App\Services\Writers;

use App\Exceptions\CustomException;
use App\Exceptions\CustomExceptionCase;
use App\Services\AbstractFactory;
use Exception;

class WriterFactory extends AbstractFactory
{
    public function __construct(private readonly string $action) {}

    /**
     * @throws Exception
     */
    public function createProduct(): Writer
    {
        return match ($this->action) {
            WriterFactoryCase::sort->name => new WriterDisplay(),
            WriterFactoryCase::file->name => new WriterFile(),
            WriterFactoryCase::db->name   => new WriterDB(),
            default => throw new CustomException(CustomExceptionCase::InvalidAction)
        };
    }
}
