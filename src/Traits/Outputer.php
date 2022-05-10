<?php

namespace Source\Traits;

trait Outputer
{
    public function callOutput(): void
    {
        $this->txt->outputArray(
            $this->outputArray,
            $this->sizeOfArray,
            $this->name,
            $this->inputArray
        );

        $this->screen->outputArray(
            $this->outputArray,
            $this->sizeOfArray,
            $this->name,
            $this->inputArray
        );

        $jsonArray = $this->json->outputArray(
            $this->outputArray,
            $this->sizeOfArray,
            $this->name,
            $this->inputArray
        );

        $this->callDBConnection($jsonArray);
    }
}