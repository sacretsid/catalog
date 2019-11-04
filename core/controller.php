<?php


namespace Core;

/**
 * Class Controller
 * @package Core
 */
class Controller
{
    /** @var Model */
    public $Model;
    /** @var string view name */
    public $View = '';

    /**
     * Controller constructor.
     */
    public function __construct()
    {
    }

    public function render()
    {
    }

    public function index()
    {
        $this->render();
    }
}