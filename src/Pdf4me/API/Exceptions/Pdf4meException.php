<?php

namespace Pdf4me\API\Exceptions;

/**
 * Pdf4meException extends the Exception class with simplified messaging
 * @package Pdf4me\API
 */
class Pdf4meException extends \Exception
{

    /**
     * @param string $message
     * @param int $code
     * @param \Exception $previous
     */
    public function __construct($message, $code = 0, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->errorDetails = $message;
    }
    
    /**
     * Returns an array of error fields with descriptions.
     * @return array
     */
    public function getErrorDetails()
    {
        return $this->errorDetails;
    }
}
