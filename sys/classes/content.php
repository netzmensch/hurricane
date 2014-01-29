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
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return void
     */
    public function parseContent()
    {
        $parsers = $this->getParsers();

        /** @var abstractParser $currentParser */
        $currentParser = null;

        foreach ($parsers as $parser) {
            $currentParser = new $parser($this->getContent());
            $currentParser->parseContent();
            $this->setContent($currentParser->getContent());
        }
    }

    /**
     * @return array
     */
    protected function getParsers()
    {
        $parsers = array();

        foreach (glob("sys/classes/parsers/*.php") as $filePath) {
            $pathParts = explode('/', $filePath);
            $parsers[] = __NAMESPACE__ . '\\parsers\\' . str_replace('.php', '',end($pathParts));
        }

        return $parsers;
    }
}