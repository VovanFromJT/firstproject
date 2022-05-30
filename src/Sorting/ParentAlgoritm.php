<?php

namespace Source\Sorting;

use Exception;
use Source\Interfaces\ISort;
use Source\Output\WriterDB;
use Source\Output\WriterDisplay;
use Source\Output\WriterFile;

abstract class ParentAlgoritm implements ISort
{
    protected const SORT = "sort";
    protected const FILE = "file";
    protected const DB = "db";

    protected string $name;
    protected int $sizeOfArray;
    protected int $count = 0;
    protected array $outputArray;

    public function __construct(
        string $name
    ) {
       $this->name = $name;
    }

    public function callOutput(array $inputArray, string $action): void
    {
        try {
            switch ($action) {
                case self::SORT:
                    $screen = new WriterDisplay(
                        $this->outputArray,
                        $this->sizeOfArray,
                        $this->name,
                        $inputArray
                    );
                    $screen->outputArray();
                    break;
                case self::FILE:
                    $txt = new WriterFile(
                        $this->outputArray,
                        $this->sizeOfArray,
                        $this->name,
                        $inputArray
                    );
                    $txt->outputArray();
                    break;
                case self::DB:
                    $json = new WriterDB(
                        $this->outputArray,
                        $this->sizeOfArray,
                        $this->name,
                        $inputArray
                    );
                    $json->outputArray();
                    break;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}