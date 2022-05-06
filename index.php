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
</head>
<body>
<style>
    td, tr, table {
        border: 1px solid black;
        margin: 5px;
        padding: 5px;
    }
</style>
<form method="post">
    <br>Size of Array:  <input type="text" name="sizeOfArray">
    <input type="submit" value="Confirm">
    <?php if (isset($_POST['sizeOfArray']))
    {
        $sizeOfArray = $_POST['sizeOfArray'];
        $call = new CallMethods($sizeOfArray);
        $call->callGenerate();
    }?>
</form>
</body>
</html>
