<?php

namespace App\Models\Writers;

use App\Exceptions\CustomException;
use App\Exceptions\CustomExceptionCase;
use App\Models\AbstractFactory;
use Exception;

class WriterFactory extends AbstractFactory
{
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
            ActionCase::sort->name => new WriterDisplay(),
            ActionCase::file->name => new WriterFile(),
            ActionCase::db->name => new WriterDB(),
            default => throw new CustomException(CustomExceptionCase::InvalidAction)
        };
    }
}
