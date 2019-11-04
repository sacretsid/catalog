<?php


namespace Application\Catalog\Models;

use Core\Model;

/**
 * Class AuthorModel
 * @package Application\Catalog\Models
 */
class AuthorModel extends Model
{
    /**
     * AuthorModel constructor.
     * @param string $name
     */
    public function __construct(string $name = 'author')
    {
        parent::__construct($name);
    }
}