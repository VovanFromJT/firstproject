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
        Storage::disk('public')->put($name . '.txt', '');
        for ($firstIndex = 0; $firstIndex < $sizeOfArray; $firstIndex++) {
            $data = '';
            for ($secondIndex = 0; $secondIndex < $sizeOfArray; $secondIndex++) {
                $data .= $outputArray[$firstIndex][$secondIndex] . "\t";
            }
            Storage::disk('public')->append($name . '.txt', $data);
        }
        if (Storage::disk('public')->exists($name . '.txt')) {
            response(
                [
                    "name" => $name,
                    "outputArray" => $outputArray,
                    'message' => $name . '.txt successfully was created:)'
                ],
                200
            )->sendContent();
        } else {
            throw new Exception('Record not saved! Trouble: write in file:(');
        }
    }
}
