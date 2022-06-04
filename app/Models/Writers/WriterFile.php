<?php

namespace App\Models\Writers;

use Exception;
use Illuminate\Support\Facades\Storage;

class WriterFile extends Writer
{
    /**
     * @throws Exception
     */
    public function writeArray(array $outputArray, int $sizeOfArray, array $inputArray, string $name)
    {
        $txtFile = $name . '.txt';
        if (Storage::disk('public')->exists($txtFile) === true) {
            Storage::delete('public/'. $txtFile);
        }
        for ($firstIndex = 0; $firstIndex < $sizeOfArray; $firstIndex++) {
            $data = '';
            for ($secondIndex = 0; $secondIndex < $sizeOfArray; $secondIndex++) {
                $data .= $outputArray[$firstIndex][$secondIndex] . "\t";
            }
            Storage::disk('public')->append($txtFile, $data);
        }
        response(Storage::download('public/' . $txtFile)->sendContent());
    }
}
