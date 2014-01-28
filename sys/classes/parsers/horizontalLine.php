<?php
namespace redcross\hurricane\classes\parsers;

use redcross\hurricane\classes\abstractParser;

/**
 * Class horizontalLine
 * @package redcross\hurricane\classes\parsers
 */
class horizontalLine extends abstractParser
{
    /**
     * @return void
     */
    public function parseContent()
    {
        $this->replaceContentElement('/^----$/m', '<hr>');
    }
}