<?php
namespace redcross\hurricane\classes\parsers;

use redcross\hurricane\classes\abstractParser;

/**
 * Class head
 * @package redcross\hurricane\classes\parsers
 */
class head extends abstractParser
{
    /**
     * @return void
     */
    public function parseContent()
    {
        for ($i = 10; $i > 0; $i--) {
            $this->replaceContentElement('/^' . str_repeat('\+', $i) . '(.*)$/m', '<h' . $i . '>$1</h' . $i . '>');
        }
    }
}