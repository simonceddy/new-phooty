<?php
namespace Phooty\Exceptions;

class PhootyException extends \Exception
{
    public function __construct(
        $message = 'A Phooty exception has been thrown',
        $code = 0,
        \Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}
