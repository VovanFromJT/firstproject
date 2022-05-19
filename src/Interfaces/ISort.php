<?php

namespace Source\Interfaces;

interface ISort
{
    public function generateArray(): void;

    public function sortArray(): void;

    public function callOutput(): void;
}