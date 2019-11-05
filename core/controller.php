<?php


namespace Core;

/**
 * Class Controller
 * @package Core
 */
class Controller
{
    /** @var Model base model */
    protected $Model;
    /** @var string view name */
    protected $View = 'index';

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->Model = new Model();
    }

    protected function render()
    {
        $this->Model->render($this->View);
    }
}