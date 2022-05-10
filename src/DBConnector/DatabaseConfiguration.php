<?php

namespace Source\DBConnector;

class DatabaseConfiguration
{
    private string $host;
    private int $port;
    private string $username;
    private string $password;

    private const DB_NAME = "Arrays";

    function __construct(string $host, int $port, string $username, string $password)
    {
        $this->host = $host;
        $this->port = $port;
        $this->username = $username;
        $this->password = $password;
    }

    public function getHost(): string
    {
        return $this->host;
    }

    public function getPort(): int
    {
        return $this->port;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getDBName(): string
    {
        return self::DB_NAME;
    }
}