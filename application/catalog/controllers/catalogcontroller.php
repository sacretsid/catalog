<?php


namespace Application\Catalog\Controllers;

use Application\Catalog\Models\CatalogModel;
use Core\Controller;

/**
 * Class CatalogController
 * @package Application\Catalog\Controllers
 */
class CatalogController extends Controller
{
    /** @var CatalogModel  */
    private $CatalogModel;

    /**
     * CatalogController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->CatalogModel = new CatalogModel();
    }

    public function index()
    {
        $catalogs = $this->CatalogModel->get();
        $this->setData('Catalogs', $catalogs);
        $this->render();
    }
}