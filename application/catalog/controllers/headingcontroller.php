<?php


namespace Application\Catalog\Controllers;

use Application\Catalog\Models\CatalogModel;
use Core\Controller;

/**
 * Class CatalogController
 * @package Application\Catalog\Controllers
 */
class HeadingController extends Controller
{
    /** @var CatalogModel  */
    private $CatalogModel;

    public function __construct()
    {
        parent::__construct();
        $this->CatalogModel = new CatalogModel();
    }

    public function index()
    {
        $this->render();
    }
}