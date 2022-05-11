<?php

namespace Source\Traits;

use Source\DBConnector\DatabaseConfiguration;
use Source\DBConnector\DatabaseGateway;

trait DBConnector
{
    public function callDBConnection(): void
    {
        $name = $this->jsonArray[0];
        $inputArray = json_encode($this->jsonArray[1]);
        $outputArray = json_encode($this->jsonArray[2]);
        $date = $this->jsonArray[3];
        $config = new DatabaseConfiguration(
            "localhost",
            3306,
            "phpmyadmin",
            "koshak2002"
        );
        $gateway = new DatabaseGateway($config);

        $connection = $gateway->getConfiguration();
        $sql = "INSERT INTO Sorting (name, inputArray, outputArray, date) 
                VALUES ('$name', '$inputArray', '$outputArray', '$date')";

        if ($connection->query($sql) === TRUE) {
            echo "<p>New record in DB created successfully</p>";
        } else {
            echo "<p>Error: " . $sql . "<br>" . $connection->error . "</p>";
        }
    }
}