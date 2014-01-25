<?php
namespace redcross\hurricane\classes;

/**
 * Class app
 * @package redcross\hurricane\classes
 */
class app extends base
{
    /**
     * @var \redcross\hurricane\classes\page
     */
    protected $page;

    /**
     * @return void
     */
    public function __construct()
    {
        $path = $this->getInput('p');

        if (!$path) {
            $path = 'start';
        }

        $this->page = new page($path);
    }

    /**
     * @return void
     */
    public function run()
    {
        echo $this->page->render();
    }

    /**
     * @param string $name
     *
     * @return string|bool
     */
    protected function getInput($name)
    {
        if (!empty($_GET[$name])) {
            return $_GET[$name];
        }

        return false;
    }
}