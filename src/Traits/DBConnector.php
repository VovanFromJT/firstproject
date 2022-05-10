<?php

namespace Source\Traits;

use Source\DBConnector\DatabaseConfiguration;
use Source\DBConnector\DatabaseGateway;

trait DBConnector
{
    public function callDBConnection(array $jsonArray): void
    {
        $inputArray = json_encode($jsonArray[1]);
        $outputArray = json_encode($jsonArray[2]);
        $config = new DatabaseConfiguration("localhost", 3306, "phpmyadmin", "koshak2002");
        $gateway = new DatabaseGateway($config);

        $connection = $gateway->getConfiguration();
        $sql = "INSERT INTO Sorting (name, inputArray, outputArray, date) 
                VALUES ('$jsonArray[0]', '$inputArray', '$outputArray', '$jsonArray[3]')";

        if ($connection->query($sql) === TRUE) {
            echo "<p>New record in DB created successfully</p>";
        } else {
            echo "<p>Error: " . $sql . "<br>" . $connection->error . "</p>";
        }
    }
}