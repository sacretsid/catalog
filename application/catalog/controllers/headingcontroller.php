<?php


namespace Application\Catalog\Controllers;

use Application\Catalog\Models\HeadingModel;
use Core\Controller;

/**
 * Class CatalogController
 * @package Application\Catalog\Controllers
 */
class HeadingController extends Controller
{
    /** @var HeadingModel  */
    private $HeadingModel;

    /**
     * HeadingController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->HeadingModel = new HeadingModel();
    }

    public function index()
    {
        $headings = $this->HeadingModel->get();
        $this->setData('Headings', $headings);
        $this->render();
    }
}