<?php

namespace redcross\hurricane\classes;

/**
 * Class content
 * @package redcross\hurricane\classes
 */
class content extends base
{
    /**
     * @var string
     */
    protected $content;

    /**
     * @param string $content
     */
    public function __construct($content)
    {
        parent::__construct();

        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return void
     */
    public function parseContent()
    {
        $this->parseFormating();
        $this->parseMedia();
    }

    /**
     * @return void
     */
    protected function parseFormating()
    {
        //h1 - h10 parsing
        for ($i = 10; $i > 0; $i--) {
            $this->replaceContentElement('/' . str_repeat('\+', $i) . '(.*)/', '<h' . $i . '>$1</h' . $i . '>');
        }

        //p tags
        $this->replaceContentElement('/(.+)/', '<p>$1</p>');

        //bold
        $this->replaceContentElement('/(.*)\[b\](.*)\[\/b\](.*)/', '$1<strong>$2</strong>$3');

        //links
        $this->replaceContentElement('/(.*)\[(.*)\,(.*)\](.*)/', '$1<a href="$3">$2</a>$4');
    }

    /**
     * @return void
     */
    protected function parseMedia()
    {
        $this->replaceContentElement('/(.*)\[(.*)\](.*)/', '$1<img src="page/$2">$3');
    }

    /**
     * @param string $pattern
     * @param string $replacement
     */
    protected function replaceContentElement($pattern, $replacement)
    {
        $this->content = preg_replace($pattern, $replacement, $this->content);
    }
}