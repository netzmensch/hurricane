<?php
namespace redcross\hurricane\classes\parsers;

use redcross\hurricane\classes\abstractParser;

/**
 * Class image
 * @package redcross\hurricane\classes\parsers
 */
class image extends abstractParser
{
    /**
     * @return void
     */
    public function parseContent()
    {
        $this->replaceContentElement('/\[\[(.*)\]\]/', '<img src="page/$1">');
    }
}