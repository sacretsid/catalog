<?php


namespace Core;

/**
 * Class Controller
 * @package Core
 */
class Controller
{
    /** @var Model Base model */
    protected $Model;
    /** @var string View name */
    protected $View = 'index';
    /** @var array The data from model to view */
    protected $Data = [];

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->Model = new Model();
    }

    /**
     * @param string $view
     */
    public function setView(string $view = '')
    {
        $this->View = $view;
    }

    /**
     * @return string
     */
    public function getView()
    {
        return $this->View;
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
    public function getData(string $path, $default = '')
    {
        if (isset($this->Data[$path])) {
            return $this->Data[$path];
        } else {
            return $default;
        }
    }

    public function render()
    {
        $this->Model->render();
    }
}