<?php

namespace Source\Output;

use Exception;
use Source\Helper\Response;

class WriterFile extends Write
{

    public function __construct(
        array $outputArray,
        int $sizeOfArray,
        string $name,
        array $inputArray
    ) {
        parent::__construct(
            $outputArray,
            $sizeOfArray,
            $name,
            $inputArray
        );
    }

    public function outputArray(): void {
        try {
            $file = fopen(
                "files/txt/" . $this->name . ".txt",
                "w"
            );
            for ($firstIndex = 0; $firstIndex < $this->sizeOfArray; $firstIndex++) {
                for ($secondIndex = 0; $secondIndex < $this->sizeOfArray; $secondIndex++) {
                    fwrite($file, $this->outputArray[$firstIndex][$secondIndex] . "\t");
                }
                fwrite($file, "\n");
            }
            fclose($file);
            $response = new Response(200, 'OK');
            $response->setResponse(
                [
                    'name' => $this->name,
                    'outputArray' => $this->outputArray,
                ]
            );
            echo json_encode($response->getResponse());
        }
        catch (Exception $e) {
            $response = new Response($e->getCode(), $e->getMessage());
            echo json_encode($response->getResponse());
        }
    }
}