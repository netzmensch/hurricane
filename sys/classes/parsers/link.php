<?php
namespace redcross\hurricane\classes\parsers;

use redcross\hurricane\classes\abstractParser;

/**
 * Class link
 * @package redcross\hurricane\classes\parsers
 */
class link extends abstractParser
{
    /**
     * @return void
     */
    public function parseContent()
    {
        $this->replaceContentElement('/\[(.*)\,(.*)\]/', '<a href="$2">$1</a>');
    }
}