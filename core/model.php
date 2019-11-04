<?php


namespace Core;

/**
 * Class Model
 * @package Core
 */
class Model
{
    /** @var string name of table in database */
    public $TableName = '';
    /** @var string name of the primary key */
    public $PrimaryKey = '';

    /**
     * Model constructor.
     * @param string $name
     */
    public function __construct(string $name = '')
    {
        $this->TableName = $name;
        $this->PrimaryKey = 'id';
    }

    public function get()
    {
    }
}