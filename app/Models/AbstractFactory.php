<?php

namespace App\Models;

use App\Models\Arrays\Sorter;
use App\Models\Writers\Writer;

abstract class AbstractFactory implements ICreateProduct
{
    protected string $kindOfSort;
    protected string $action;

    /**
     * @return Sorter|Writer
     */
    abstract public function createProduct();
}
