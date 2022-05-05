<?php

require __DIR__ . '/vendor/autoload.php';

use Source\Source\CallMethods;
?>

<html>
<body>
<form method="post">
Size of Array:  <input type="text" name="sizeOfArray">
    <input type="submit">
    <?php if (isset($_GET['sizeOfArray']))
    {
        echo "<br>";
        $sizeOfArray = $_GET['sizeOfArray'];
        $call = new CallMethods($sizeOfArray);
    }?>
</form>
</body>
</html>
