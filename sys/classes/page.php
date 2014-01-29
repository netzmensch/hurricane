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
        $this->path = $path;
    }

    /**
     * @return string
     */
    public function render()
    {
        $pages = $this->getAllPageNames();
        $fixedPath = CONFIG_PATH_CONTENT . '/' . strtolower($this->path) . '.txt';

        foreach ($pages as $pagePath) {
            if (strtolower($pagePath) === $fixedPath) {
                return $this->renderPage($pagePath);
            }
        }

        $this->error(CONFIG_APP_WRONG_PATH_MESSAGE);
    }

    /**
     * @return array
     */
    protected function getAllPageNames()
    {
        $pages = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator(CONFIG_PATH_CONTENT));

        return iterator_to_array($pages);
    }

    /**
     * @param string $filePath
     *
     * @return string
     */
    protected function renderPage($filePath)
    {
        $content = new content(htmlspecialchars(file_get_contents($filePath), ENT_COMPAT, 'UTF-8', false));
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
        $template = file_get_contents(CONFIG_PATH_TEMPLATES . '/index.html');
        $renderedTemplate = str_replace('{$content}', $content, $template);

        return $renderedTemplate;
    }
}