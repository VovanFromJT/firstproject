<?php

namespace Source\Traits;

trait Merger
{
    public function callDiffArray(): void
    {
        $this->diffArray = call_user_func_array(
            'array_merge',
            $this->inputArray
        );
        sort($this->diffArray);
    }
}