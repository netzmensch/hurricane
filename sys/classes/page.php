<?php
namespace redcross\hurricane\classes;

/**
 * Class page
 * @package redcross\hurricane\classes
 */
class page extends base
{
    /**
     * @var string
     */
    protected $path;

    /**
     * @param string $path
     */
    public function __construct($path)
    {
        parent::__construct();
        $this->path = $path;
    }

    /**
     * @return string
     */
    public function render()
    {
        $pages = $this->getAllPageNames();

        $fixedPath = 'page/' . strtolower($this->path) . '.txt';

        foreach ($pages as $pagePath) {
            if (strtolower($pagePath) == $fixedPath) {
                return $this->renderPage($pagePath);
            }
        }

        $this->helper->error('wrong path...');
    }

    /**
     * @return array
     */
    protected function getAllPageNames()
    {
        $pages = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator('page'));

        return iterator_to_array($pages);
    }

    /**
     * @param string $filePath
     *
     * @return string
     */
    protected function renderPage($filePath)
    {
        $content = new content(file_get_contents($filePath));
        $content->parseContent();
        $htmlContent = $content->getContent();

        return $this->renderTemplate($htmlContent);
    }

    /**
     * @param string $content
     *
     * @return string
     */
    protected function renderTemplate($content)
    {
        $template = file_get_contents('res/template/index.html');
        $rendered = str_replace('{$content}', $content, $template);

        return $rendered;
    }
}