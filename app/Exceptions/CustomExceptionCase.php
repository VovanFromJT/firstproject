<?php

namespace App\Exceptions;

enum CustomExceptionCase
{
    case InvalidSizeArray;
    case InvalidKindSort;
    case InvalidAction;
    case InvalidDBRecord;
}
