<?php


namespace Application\Catalog\Models;

use Core\Model;

/**
 * Class CatalogModel
 * @package Application\Catalog\Models
 */
class CatalogModel extends Model
{
    /**
     * CatalogModel constructor.
     * @param string $name
     */
    public function __construct(string $name = '')
    {
        parent::__construct($name);
    }
}