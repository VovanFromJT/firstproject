<?php

namespace Source\DBConnector;

class DatabaseConnect
{
    public function getConnect(): object {

        $config = new DatabaseConfiguration(
            getenv('DB_HOST'),
            getenv('DB_USER'),
            getenv('DB_PASS'),
            getenv('DB_NAME'),
            getenv('DB_PORT')
        );

        $gateway = new DatabaseGateway($config);
        if ($gateway->getConfiguration()->connect_error) {
            echo "<p>Connection failed: " . $gateway->getConfiguration()->connect_error . "</p>";
            die();
        }
        return $gateway->getConfiguration();
    }
}