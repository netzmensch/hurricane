<?php
namespace redcross\hurricane\classes;

/**
 * Class base
 * @package redcross\hurricane\classes
 */
class base
{
    /**
     * @param string $message
     */
    public function error($message)
    {
        header("HTTP/1.0 404 Not Found");
        die($message);
    }
}