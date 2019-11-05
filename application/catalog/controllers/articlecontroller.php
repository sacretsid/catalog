<?php


namespace Application\Catalog\Controllers;

use Application\Catalog\Models\ArticleModel;
use Core\Controller;

/**
 * Class ArticleController
 * @package Application\Catalog\Controllers
 */
class ArticleController extends Controller
{
    /** @var ArticleModel  */
    private $ArticleModel;

    /**
     * ArticleController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->ArticleModel = new ArticleModel();
    }

    public function index()
    {
        $this->render();
    }
}