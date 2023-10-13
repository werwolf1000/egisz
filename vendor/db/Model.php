<?php

namespace vendor\db;

use Exception;
use stdClass;

class Model
{
    /** @var string имя таблицы в БД */
    protected static string $table = '';


    private stdClass $query;

    public function __construct()
    {
        $this->query = new stdClass();
    }

    public function where( string $field, string $operator = "", string $value = ""): Model
    {
        if(func_num_args() == 2) {

            $this->query->where[] = $field. " = ". (is_numeric($operator) ? $operator : "'" . $operator ."'");
        }
        else {
            $this->query->where[] = $field. " ". $operator. " ". (is_numeric($operator) ? $operator : "'" . $operator ."'");
        }

        return $this;
    }
    public function limit( int $start, int $offset) :Model
    {
        $this->query->limit = " LIMIT " . $start . ", " . $offset;

        return $this;
    }

    /**
     * @throws Exception
     */
    public function queryExec(string $sql): array
    {
        $db = Db::getInstance();
        return $db->query($sql, static::class);
    }

    /**
     * @throws Exception
     */
    public function get() : array
    {
        $db = Db::getInstance();
        $sql = 'SELECT * FROM ' . static::$table;

        if(!empty($this->query->where)) {
            $sql .= " WHERE ".implode(" AND ", $this->query->where);
        }

        if(!empty($this->query->limit)) {
            $sql .= $this->query->limit;
        }
        $sql .= ";";
        var_dump($sql);
        return $db->query($sql, static::class);
    }
}