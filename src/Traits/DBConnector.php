<?php

namespace Source\Traits;

use Source\DBConnector\DatabaseConfiguration;
use Source\DBConnector\DatabaseGateway;

trait DBConnector
{
    public function callDBConnection(array $jsonArray): void
    {
        $name = $jsonArray[0];
        $inputArray = json_encode($jsonArray[1]);
        $outputArray = json_encode($jsonArray[2]);
        $date = $jsonArray[3];

        $config = new DatabaseConfiguration(
            "localhost",
            3306,
            "phpmyadmin",
            "koshak2002"
        );

        $gateway = new DatabaseGateway($config);
        $connection = $gateway->getConfiguration();

        if ($connection->connect_error) {
            echo "<p>Connection failed: " . $connection->connect_error . "</p>";
            return;
        }

        $sql = "INSERT INTO Sorting (name, inputArray, outputArray, date) 
                VALUES ('$name', '$inputArray', '$outputArray', '$date')";

        if ($connection->query($sql) === true) {
            echo "<p>New record in DB created successfully</p>";
        } else {
            echo "<p>Error: " . $sql . "<br>" . $connection->error . "</p>";
        }
    }
}