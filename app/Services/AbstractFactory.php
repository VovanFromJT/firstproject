<?php

namespace App\Services;

abstract class AbstractFactory implements ICreateProduct
{
    /**
     * @return mixed
     */
    abstract public function createProduct();
}
