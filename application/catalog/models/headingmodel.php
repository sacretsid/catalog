<?php


namespace Application\Catalog\Models;

use Core\Model;

/**
 * Class HeadingModel
 * @package Application\Catalog\Models
 */
class HeadingModel extends Model
{
    /**
     * HeadingModel constructor.
     * @param string $name
     */
    public function __construct(string $name = 'heading')
    {
        parent::__construct($name);
    }
}