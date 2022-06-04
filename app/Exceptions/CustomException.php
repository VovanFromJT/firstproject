<?php

namespace App\Exceptions;

use Exception;

class CustomException extends Exception {
    public function __construct(protected CustomExceptionCase $case){
         match($case){
             CustomExceptionCase::InvalidKindSort => parent::__construct("Invalid kind of sort:(", 500),
             CustomExceptionCase::InvalidAction => parent::__construct("Invalid action:(", 500),
             CustomExceptionCase::InvalidDBRecord => parent::__construct('Record not saved! Trouble: connect to DB:(', 500),
        };
    }
}
