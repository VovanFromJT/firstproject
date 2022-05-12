<?php

require __DIR__ . '/vendor/autoload.php';

use Source\Controller\CallMethods;
use Source\Helper\GenerateArray;

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Sorting</title>
    <h2>Sorting Arrays</h2>
</head>
<body>
<style>
    h2 {
       text-align: center;
    }
    p {
        font-size: 6mm;
        text-align: center;
    }
    td {

        font-size: 5.5mm;
        font-family: "Arial", serif;
        text-align: center;
        align-content: center;
        border: 0.2mm solid black;
        padding: 10px;
    }
    table
    {
        margin: 10px auto;
    }
</style>
<form method="post">
    <p><br>Size of Array(n): <label>
            <input type="text" pattern="^[ 0-9]+$" maxlength="3" name="sizeOfArray" required>
        </label>
        <input type="submit" value="Confirm"></p><hr>
    <?php
    if (isset($_POST['sizeOfArray'])) {
        $sizeOfArray = $_POST['sizeOfArray'];
        try {
            if (
                    !is_numeric($sizeOfArray)
                    || $sizeOfArray < 2
            ) {
                throw new Exception("Value must be 2 or above");
            } else {
                $generateArray = new GenerateArray($sizeOfArray);
                $inputArray = $generateArray->generate();

                $call = new CallMethods($sizeOfArray, $inputArray);
                $call->callRun();
            }
        } catch (Exception $e) {
            echo '<p>Message: ' . $e->getMessage() . '</p>';
        }
    }?>
</form>
</body>
</html>
