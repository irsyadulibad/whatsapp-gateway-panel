<?php

namespace App\Exceptions\Api;

use App\Traits\ApiResponser;
use Exception;

class ErrorResponse extends Exception
{
    use ApiResponser;

    private $data;

    public function __construct($data, $message, $code)
    {
        $this->data = $data;
        $this->message = $message;
        $this->code = $code;
    }

    public function render()
    {
        return $this->error($this->data, $this->message, $this->code);
    }
}
