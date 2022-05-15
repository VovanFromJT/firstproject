<?php

namespace Source\Traits;

trait Runner
{
    public function runApp(): void
    {
        $this->generateArray();
        $this->sortArray();
        $this->callOutput();
    }
}