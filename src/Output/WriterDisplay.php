<?php

namespace Source\Output;

use Exception;
use Source\Helper\Response;

class WriterDisplay extends Write
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

    public function outputArray(): void
    {
        try {
            $jsonArray = [
                "name" => $this->name,
                "outputArray" => $this->outputArray,
            ];
            $response = new Response(200, 'OK');
            $response->setResponse($jsonArray);
            echo json_encode($response->getResponse());
        } catch (Exception $e) {
            $response = new Response(
                $e->getCode(),
                $e->getMessage()
            );
            $response->setResponse($jsonArray);
            echo json_encode($response->getResponse());
        }
    }
}



