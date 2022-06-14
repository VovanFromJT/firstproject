<?php

namespace App\Services\Writers;

use Exception;
use Illuminate\Support\Facades\Storage;

class WriterFile extends Writer
{
    public function writeArray(array $outputArray, int $sizeOfArray, array $inputArray, string $name): string
    {
        $txtFile = $name . '.txt';
        if (Storage::disk('public')->exists($txtFile) === true) {
            Storage::delete('public/' . $txtFile);
        }
        $data = '';
        for ($firstIndex = 0; $firstIndex < $sizeOfArray; $firstIndex++) {
            for ($secondIndex = 0; $secondIndex < $sizeOfArray; $secondIndex++) {
                $data .= $outputArray[$firstIndex][$secondIndex] . "\t";
            }
            $data .= "\n";
        }
        Storage::disk('public')->put($txtFile, $data);
        return 'public/' . $txtFile;
    }
}
