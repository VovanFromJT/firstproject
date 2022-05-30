<?php

namespace Source\Helper;

class Response
{
    private array $response;

    public function __construct(int $code, string $message)
    {
        $this->response = [
            'status_code' => $code,
            'message' => $message,
            'body' => '',
        ];
    }

    public function setResponse(array $jsonArray): void
    {
        $this->response['body'] = $jsonArray;
    }

    public function getResponse(): array
    {
        return $this->response;
    }
}