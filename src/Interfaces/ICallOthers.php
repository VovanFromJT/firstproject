<?php

namespace Source\Interfaces;

interface ICallOthers
{
//    public function callDiffArray(): void;
    public function callOutput(): void;
    public function callDBConnection(array $jsonArray): void;
}