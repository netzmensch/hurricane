<?php
namespace redcross\hurricane\classes;

abstract class abstractParser
{
    /**
     * @var string
     */
    protected $content;

    /**
     * @return void
     */
    abstract public function parseContent();

    /**
     * @param string $content
     */
    public function __construct($content)
    {
        $this->setContent($content);
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    protected function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @param string $pattern
     * @param string $replacement
     */
    protected function replaceContentElement($pattern, $replacement)
    {
        $this->content = preg_replace($pattern, $replacement, $this->getContent());
    }
}