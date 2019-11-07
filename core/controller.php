<?php


namespace Core;

/**
 * Class Controller
 * @package Core
 */
class Controller
{
    /** @var string View name */
    protected $View = 'index';
    /** @var string $Template name */
    protected $Template = 'index';
    /** @var array The data from model to view */
    protected $Data = [];

    /**
     * Controller constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param string $key
     * @param null|mixed $value
     */
    public function setData(string $key, $value = null)
    {
        $this->Data[$key] = $value;
    }

    /**
     * @param string $path
     * @param string $default
     * @return mixed|string
     */
    public function getData(string $path = null, string $default = '')
    {
        if (!empty($path)) {
            if (isset($this->Data[$path])) {
                return $this->Data[$path];
            } else {
                return $default;
            }
        } else {
            return $this->Data;
        }
    }

    /**
     * @param string $view
     */
    public function setView(string $view = '')
    {
        if (!empty($view)) {
            $this->View = $view;
        }
    }

    /**
     * @return string
     */
    public function getView()
    {
        return $this->View;
    }

    /**
     * @param string $template
     */
    public function setTemplate(string $template = '')
    {
        if (!empty($view)) {
            $this->Template = $view;
        }
    }

    /**
     * @return string
     */
    public function getTemplate()
    {
        return $this->Template;
    }

    public function render()
    {
        $templatePath = $this->getApplicationPath();
        $templatePath .= '/template/' . $this->getTemplate() . '.html';

        if (file_exists($templatePath)) {
            include($templatePath);
        }
    }

    /**
     * @return string
     */
    private function getApplicationPath()
    {
        $applicationPath = 'application/' . strtolower(\Router::getApplicationName());

        return $applicationPath;
    }
}