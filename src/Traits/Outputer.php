<?php

namespace Source\Traits;

trait Outputer
{
    public function callOutput(): void
    {
        switch ($this->action){
            case 0:
                $this->screen->outputArray(
                    $this->outputArray,
                    $this->sizeOfArray,
                    $this->name,
                    $this->inputArray
                );
                break;
            case 1:
                $this->txt->outputArray(
                    $this->outputArray,
                    $this->sizeOfArray,
                    $this->name,
                    $this->inputArray
                );
                break;
            case 2:
                $this->json->outputArray(
                    $this->outputArray,
                    $this->sizeOfArray,
                    $this->name,
                    $this->inputArray
                );
                break;
        }
    }
}