<?php

namespace App\Exceptions;

use Exception;

class CustomException extends Exception {
    public function __construct(private readonly CustomExceptionCase $case){
        match($case){
            CustomExceptionCase::InvalidSizeArray =>parent::__construct("Invalid size of array:(", 400),
            CustomExceptionCase::InvalidKindSort => parent::__construct("Invalid kind of sort:(", 400),
            CustomExceptionCase::InvalidAction => parent::__construct("Invalid action:(", 400),
            CustomExceptionCase::InvalidDBRecord => parent::__construct('Record not saved! Trouble: connect to DB:(', 500),
        };
    }
}
