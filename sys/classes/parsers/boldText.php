<?php
namespace redcross\hurricane\classes\parsers;

use redcross\hurricane\classes\abstractParser;

/**
 * Class boldText
 * @package redcross\hurricane\classes\parsers
 */
class boldText extends abstractParser
{
    /**
     * @return void
     */
    public function parseContent()
    {
        $this->replaceContentElement('/(.*)\[b\](.*)\[\/b\](.*)/', '$1<strong>$2</strong>$3');
    }
}