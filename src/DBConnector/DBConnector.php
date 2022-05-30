<?php

namespace Source\DBConnector;

use Exception;
use mysqli;
use mysqli_result;
use Source\Helper\Response;

trait DBConnector
{
    private mysqli $connection;
    public function newDbRecord(array $jsonArray): void
    {
        try {
            $name = $jsonArray[0];
            $inputArray = json_encode($jsonArray[1]);
            $outputArray = json_encode($jsonArray[2]);
            $date = $jsonArray[3];

            $sql = $this->mysqlInsert(
                'Sorting',
                [
                    'name' => $name,
                    'inputArray' => $inputArray,
                    'outputArray' => $outputArray,
                    'date' => $date,
                ]
            );

            /*$sql = "INSERT INTO Sorting (name, inputArray, outputArray, date)
                    VALUES ('$name', '$inputArray', '$outputArray', '$date')";*/

            $this->connection->query($sql);
        } catch (Exception $e) {
            $response = new Response($e->getCode(), $e->getMessage());
            echo json_encode($response->getResponse());
        }
    }

    public function setConnect(): void
    {
        $connect = new DatabaseConnect();
        $this->connection = $connect->getConnect();
    }

    private function mysqlInsert($table, $inserts): mysqli_result|bool
    {
        $values = array_map('mysqli_real_escape_string', array_values($inserts));
        $keys = array_keys($inserts);

        return mysqli_query($this->connection, 'INSERT INTO '.$table.' ('.implode('`,`', $keys).') VALUES (\''.implode('\',\'', $values).'\')');
    }
}