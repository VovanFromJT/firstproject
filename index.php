<?php

require __DIR__ . '/vendor/autoload.php';

use Source\Source\CallMethods;
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
    <p><br>Size of Array(n):  <input type="number" min="2" max="100" pattern="^[ 0-9]+$" name="sizeOfArray">
    <input type="submit" value="Confirm"></p><hr>
    <?php if (isset($_POST['sizeOfArray']))
    {
        $sizeOfArray = $_POST['sizeOfArray'];
        $call = new CallMethods($sizeOfArray);
        $call->callGenerate();
    }?>
</form>
</body>
</html>
