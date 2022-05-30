<?php
require_once __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;
use Source\Factory\ArraySorterFactory;
use Source\Helper\Generator;

header('Access-Control-Allow-Origin: http://localhost:3000');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

$dotenv = Dotenv::createUnsafeImmutable(__DIR__);
$dotenv->load();

if (
    $_POST['kindOfSort']
        && $_POST['sizeOfArray']
        && $_POST['action']
) {
    $generator = new Generator($_POST['sizeOfArray']);
    [$diffArray, $inputArray] = $generator->generateArray();
    $factory = new ArraySorterFactory($_POST['kindOfSort']);
    $getArray = $factory->createKind();
    $getArray->sortArray($_POST['sizeOfArray'], $diffArray);
    $getArray->callOutput($inputArray, $_POST['action']);
}