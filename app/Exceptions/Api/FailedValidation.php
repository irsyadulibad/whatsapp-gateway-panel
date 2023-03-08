<?php

namespace App\Exceptions\Api;

use App\Traits\ApiResponser;
use Exception;

class FailedValidation extends Exception
{
    use ApiResponser;

    private $errors;

    public function __construct($errors)
    {
        $this->errors = $errors;
    }

    public function render()
    {
        return $this->validationError($this->errors);
    }
}
