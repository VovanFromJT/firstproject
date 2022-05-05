<?php

require __DIR__ . '/vendor/autoload.php';

use Source\Source\CallMethods;
?>

<html lang="en">
<body>
<form method="post">
Size of Array:  <input type="text" name="sizeOfArray">
    <input type="submit">
    <?php if (isset($_POST['sizeOfArray']))
    {
        echo "<br>";
        $sizeOfArray = $_POST['sizeOfArray'];
        $call = new CallMethods($sizeOfArray);
    }?>
</form>
</body>
</html>
