<?php

namespace App\Models\Writers;

use Exception;
use Illuminate\Support\Facades\DB;

class WriterDB extends Writer
{
    /**
     * @throws Exception
     */
    public function writeArray(array $outputArray, int $sizeOfArray, array $inputArray, string $name)
    {
        if (DB::table('Sortings')->insert([
            'name' => $name,
            'inputArray' => json_encode($inputArray),
            'outputArray' => json_encode($outputArray),
            'date' => date("y:m:d"),
        ]) === true) {
            response(
                [
                    "name" => $name,
                    "outputArray" => $outputArray,
                    'message' => 'Record successfully saved in DB:)'
                ],
                200
            )->sendContent();
        } else {
            throw new Exception('Record not saved! Trouble: connect to DB:(');
        }
    }
}
