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
            $path = CONFIG_APP_STARTPAGE;
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
        $inputValue = $_GET[$name];

        if (!empty($inputValue)) {
            return $inputValue;
        }

        return false;
    }
}