<?php

namespace App\Services\Writers;

enum WriterFactoryCase
{
    case sort;
    case file;
    case db;
}
