<?php

namespace App\Services\Writers;

use App\Exceptions\CustomException;
use App\Exceptions\CustomExceptionCase;
use App\Models\ArrayDB;
use Exception;

class WriterDB extends Writer
{
    /**
     * @throws Exception
     */
    public function writeArray(array $outputArray, int $sizeOfArray, array $inputArray, string $name): array
    {
        if (ArrayDB::factory()->create([
                "name" => $name,
                "inputArray" => json_encode($inputArray),
                "outputArray" => json_encode($outputArray),
                "date" => date("y:m:d"),
            ])) {
            return [
                'message' => 'Record successfully saved in DB:)',
                "status" => 200,
            ];
        } else {
            throw new CustomException(CustomExceptionCase::InvalidDBRecord);
        }
    }
}
