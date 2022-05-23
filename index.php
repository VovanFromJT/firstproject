<?php
require_once __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;
use Source\Factory\ArraySorterFactory;

const CSS_PATH = 'resources/css/';
const JS_PATH = 'resources/js/';

$dotenv = Dotenv::createUnsafeImmutable(__DIR__);
$dotenv->load();
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
        <option value="none">None</option>
        <option value="Horizontal">Horizontal</option>
        <option value="Vertical">Vertical</option>
        <option value="Snake">Snake</option>
        <option value="Diagonal">Diagonal</option>
        <option value="Snail">Snail</option>
    </select>
    <label for="kindOfSort">
        Size of Array(n):
    </label>
    <label>
        <input type="range" min="2" max="20" value="2" oninput="this.nextElementSibling.value = this.value" id="sizeOfArray" name="sizeOfArray" required>
    <output>2</output>
    </label>
    <input type="submit" value="Sort">
    <input type="submit" formmethod="post" name="inFile" value="File">
    <input type="submit" formmethod="post" name="toDB" value="DB">
    <hr>
    <?php
    if (
            $_GET['kindOfSort']
            && $_GET['sizeOfArray']
    ) {
        $action = 0;
        if ($_POST['inFile']) {
            $action = 1;
        }
        elseif ($_POST['toDB']) {
            $action = 2;
        }
        $factory = new ArraySorterFactory(
                $_GET['sizeOfArray'],
                $_GET['kindOfSort'],
                $action
        );
        $getArray = $factory->createKind();
        if (!empty($getArray)) {
            $getArray->generateArray();
            $getArray->sortArray();
            $getArray->callOutput();
        }
    }
    ?>
</form>
</body>
</html>
