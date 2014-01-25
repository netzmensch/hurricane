<?php
namespace redcross\hurricane\classes;

/**
 * Class base
 * @package redcross\hurricane\classes
 */
class base
{
    /**
     * @var \redcross\hurricane\classes\helper
     */
    protected $helper;

    /**
     * @return void
     */
    public function __construct()
    {
        $this->helper = new helper();
    }
}