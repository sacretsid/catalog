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
    /** @var SQL */
    public $SQL;

    /**
     * Model constructor.
     * @param string $name
     */
    public function __construct(string $name = '')
    {
        $this->TableName = $name;
        $this->PrimaryKey = 'id';
        $this->SQL = new SQL();
    }

    /**
     * @param array $fields
     * @param array $where
     * @return array|null
     */
    public function get(array $fields = [], array $where = [])
    {
        return $this->SQL->fetchALL($this->TableName, $fields, $where);
    }

    /**
     * @param array $fields
     * @param array $where
     * @return array|null
     */
    public function first(array $fields = [], array $where = [])
    {
        return $this->SQL->fetch($this->TableName, $fields, $where);
    }

    /**
     * @param array $fields
     */
    public function insert(array $fields)
    {
        $this->SQL->insert($this->TableName, $fields);
    }

    /**
     * @param array $fields
     * @param array $where
     */
    public function update(array $fields, array $where)
    {
        $this->SQL->update($this->TableName, $fields);
    }
}