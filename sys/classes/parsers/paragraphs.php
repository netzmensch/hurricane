<?php
namespace redcross\hurricane\classes\parsers;

use redcross\hurricane\classes\abstractParser;

/**
 * Class paragraphs
 * @package redcross\hurricane\classes\parsers
 */
class paragraphs extends abstractParser
{
    /**
     * @return void
     */
    public function parseContent()
    {
        $this->replaceContentElement('/^(?!<)(.+)$/m', '<p>$1</p>');
    }
}