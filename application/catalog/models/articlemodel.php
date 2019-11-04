<?php


namespace Application\Catalog\Models;

use Core\Model;

/**
 * Class ArticleModel
 * @package Application\Catalog\Models
 */
class ArticleModel extends Model
{
    /**
     * ArticleModel constructor.
     * @param string $name
     */
    public function __construct(string $name = 'article')
    {
        parent::__construct($name);
    }
}