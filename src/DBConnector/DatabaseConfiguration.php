<?php

namespace Source\DBConnector;

class DatabaseConfiguration
{
    private string $host;
    private int $port;
    private string $userName;
    private string $password;
    private string $dbName;

    public function __construct(
        string $host,
        string $userName,
        string $password,
        string $dbName,
        int $port
    ) {
        $this->host = $host;
        $this->userName = $userName;
        $this->password = $password;
        $this->dbName = $dbName;
        $this->port = $port;
    }

    public function getHost(): string
    {
        return $this->host;
    }

    public function getUsername(): string
    {
        return $this->userName;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getDBName(): string
    {
        return $this->dbName;
    }

    public function getPort(): int
    {
        return $this->port;
    }
}