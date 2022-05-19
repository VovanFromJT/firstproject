<?php

namespace Source\Traits;

use Source\DBConnector\DatabaseConnect;

trait DBConnector
{
    protected function setConnect(): void
    {
        $connect = new DatabaseConnect();
        $this->connection = $connect->getConnect();
    }

    public function newDbRecord(array $jsonArray): void
    {
        $name = $jsonArray[0];
        $inputArray = json_encode($jsonArray[1]);
        $outputArray = json_encode($jsonArray[2]);
        $date = $jsonArray[3];

        $sql = "INSERT INTO Sorting (name, inputArray, outputArray, date) 
                VALUES ('$name', '$inputArray', '$outputArray', '$date')";

        if ($this->connection->query($sql) === true) {
            echo "<p>$name record in DB created successfully</p>";
        } else {
            echo "<p>Error: " . $sql . "<br>" . $this->connection->error . "</p>";
        }
    }
}