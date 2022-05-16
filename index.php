<?php
require_once __DIR__ . '/vendor/autoload.php';

use Source\Controller\CallMethods;

const CSS_PATH = 'resources/css/';
const JS_PATH = 'resources/js/';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH; ?>main.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo JS_PATH; ?>main.js"></script>
    <title>Sorting</title>
    <h2>Sorting Arrays</h2>
</head>
<body>

<form id="formSubmit">
    <select name="kindOfSort" id="kindOfSort" required>
        <option value="all">All Sort</option>
        <option value="horizontal">Horizontal</option>
        <option value="vertical">Vertical</option>
        <option value="snake">Snake</option>
        <option value="diagonal">Diagonal</option>
        <option value="snail">Snail</option>
    </select>
    <label for="kindOfSort">
        Size of Array(n):
    </label>
    <label>
        <input type="range" min="2" max="20" value="2" oninput="this.nextElementSibling.value = this.value" id="sizeOfArray" name="sizeOfArray" required>
    <output>2</output>
    </label>
    <input type="submit" id="sort" value="Sort">
    <input type="submit" formmethod="post" id="file" name="inFile" value="File">
    <input type="submit" formmethod="post" id="db" name="toDB" value="DB">
    <hr>
    <?php
    if ($_GET['sizeOfArray'] && $_GET['kindOfSort']) {
        $action = 0;
        $sizeOfArray = $_GET['sizeOfArray'];
        $kindOfSort = $_GET['kindOfSort'];
        if ($_POST['inFile']){
            $action = 1;
        }
        elseif ($_POST['toDB']){
            $action = 2;
        }
        $call = new CallMethods(
                $sizeOfArray,
                $kindOfSort,
                $action
        );
        $call->callRun();
    }
    ?>
</form>
</body>
</html>
