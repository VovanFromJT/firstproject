<?php

namespace App\Models;

abstract class AbstractFactory implements ICreateProduct
{
    /**
     * @var string
     */
    protected $kindOfSort;

    /**
     * @var string
     */
    protected $action;

    /**
     * @return mixed
     */
    abstract public function createProduct();
}
