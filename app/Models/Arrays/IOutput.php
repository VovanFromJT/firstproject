<?php

namespace App\Models\Arrays;

use App\Models\Writers\Writer;

interface IOutput
{
    public function callOutput(Writer $write, array $inputArray): void;
}
