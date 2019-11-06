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
    /** @var Database */
    public $SQL;

    /**
     * Model constructor.
     * @param string $name
     */
    public function __construct(string $name = '')
    {
        $this->TableName = $name;
        $this->PrimaryKey = 'id';
        $this->SQL = new Database();
    }

    /**
     * @param array $fields
     */
    public function insert(array $fields)
    {

    }

    public function update(array $fields, array $where)
    {

    }

    /**
     * @return array
     */
    public function get()
    {
        return $this->SQL->get($this->TableName);
    }

    public function render(string $view = '')
    {

    }
}