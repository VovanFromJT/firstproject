<?php

namespace Source\DBConnector;

class DatabaseGateway
{
    private object $configuration;

    function __construct(DatabaseConfiguration $configuration)
    {
        $this->configuration = $configuration;
    }

    public function getConfiguration(): object
    {
        return new \mysqli(
            $this->configuration->getHost(),
            $this->configuration->getUsername(),
            $this->configuration->getPassword(),
            $this->configuration->getDBName(),
            $this->configuration->getPort()
        );
    }
}