<?php


namespace Core;


class SQL
{
    /**
     * @param string $table
     * @param array $fields
     * @param array $where
     * @return array|null
     */
    public function fetchALL(string $table, array $fields = [], array $where = [])
    {
        if (!empty($table)) {
            $sql = 'SELECT ' . $fields;
            $sql .= ' FROM ' . $table;
            $sql .= 'WHERE ' . $where;

            return Database::run($sql)->fetchAll();
        } else {
            return null;
        }
    }

    /**
     * @param string $table
     * @param array $fields
     * @param array $where
     * @return array|null
     */
    public function fetch(string $table, array $fields = [], array $where = [])
    {
        if (!empty($table)) {
            $sql = 'SELECT ' . $fields;
            $sql .= ' FROM ' . $table;
            $sql .= 'WHERE ' . $where;

            return Database::run($sql)->fetch();
        } else {
            return null;
        }
    }

    /**
     * @param string $table
     * @param array $fields
     * @return bool|false|\PDOStatement
     */
    public function insert(string $table, array $fields = [])
    {
        if (!empty($table)) {
            $sql = 'INSERT INTO ' . $table;
            $sql .= ' ()';
            $sql .= ' VALUES';
            $sql .= ' ()';

            return Database::run($sql);
        } else {
            return null;
        }
    }

    /**
     * @param string $table
     * @param array $fields
     * @param array $where
     * @return bool|false|\PDOStatement
     */
    public function update(string $table, array $fields = [], array $where = [])
    {
        if (!empty($table)) {
            $sql = 'UPDATE ' . $table;
            $sql .= ' SET ' . $fields;
            $sql .= ' WHERE ' . $where;

            return Database::run($sql);
        } else {
            return null;
        }
    }
}