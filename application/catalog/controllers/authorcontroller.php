<?php


namespace Application\Catalog\Controllers;

use Application\Catalog\Models\AuthorModel;
use Core\Controller;

/**
 * Class AuthorController
 * @package Application\Catalog\Controllers
 */
class AuthorController extends Controller
{
    /** @var AuthorModel  */
    private $AuthorModel;

    /**
     * AuthorController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->AuthorModel = new AuthorModel();
    }

    public function index()
    {
        $authors = $this->AuthorModel->get();
        $this->setData('Authors', $authors);
        $this->render();
    }
}