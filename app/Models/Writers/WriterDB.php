<?php

namespace App\Models\Writers;

use App\Models\ArrayDB;
use Exception;

class WriterDB extends Writer
{
    /**
     * @throws Exception
     */
    public function writeArray(array $outputArray, int $sizeOfArray, array $inputArray, string $name)
    {
        if (ArrayDB::create([
                "name" => $name,
                "inputArray" => json_encode($inputArray),
                "outputArray" => json_encode($outputArray),
                "date" => date("y:m:d"),
            ])) {
            response(
                [
                    "name" => "",
                    "outputArray" => [],
                    'message' => 'Record successfully saved in DB:)',
                ],
                200
            )->sendContent();
        } else {
            throw new Exception('Record not saved! Trouble: connect to DB:(');
        }
    }
}
