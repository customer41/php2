<?php

namespace App\Classes;

abstract class Model
{
    protected static $table;
    public $id;

    public static function findAll()
    {
        $db = new Db();
        $data = $db->query(
            'SELECT * FROM ' . static::$table,
            [],
            static::class
        );
        return $data;
    }

    public static function findLast($count)
    {
        $db = new Db();
        $data = $db->query(
            'SELECT * FROM ' . static::$table . ' ORDER BY id DESC LIMIT ' . $count,
            [],
            static::class
        );
        return $data;
    }

    public static function findById($id)
    {
        $db = new Db();
        $data = $db->query(
            'SELECT * FROM ' . static::$table . ' WHERE id=:id',
            ['id' => $id],
            static::class
        );
        if (!empty($data)) {
            return $data[0];
        } else {
            return false;
        }
    }

    public static function findByColumn($column, $value)
    {
        $db = new Db();
        $data = $db->query(
            'SELECT * FROM ' . static::$table . ' WHERE ' . $column . '=:value',
            [':value' => $value],
            static::class
        );
        return $data;
    }

    public function insert()
    {
        $props = [];
        $binds = [];
        $params = [];
        foreach ($this as $k => $v) {
            if ('id' == $k) {
                continue;
            }
            $props[] = $k;
            $binds[] = ':' . $k;
            $params[':' . $k] = $v;
        }
        $sql = '
        INSERT INTO ' . static::$table . '
        (' . implode(', ', $props) . ')
        VALUES
        (' . implode(', ', $binds) . ')
        ';
        $db = new Db();
        $db->execute($sql, $params);
        $this->id = $db->insertId();
    }

    public function update()
    {
        $props = [];
        $params = [];
        foreach ($this as $k => $v) {
            $params[':' . $k] = $v;
            if ('id' == $k) {
                continue;
            }
            $props[] = $k . '=:' . $k;
        }
        $sql = 'UPDATE ' . static::$table . ' SET ' . implode(', ', $props) . ' WHERE id=:id';
        $db = new Db();
        $db->execute($sql, $params);
    }

    public function save()
    {
        if (empty($this->id)) {
            $this->insert();
        } else {
            $this->update();
        }
    }

    public function delete()
    {
        $sql = 'DELETE FROM ' . static::$table . ' WHERE id=:id';
        $db = new Db();
        $db->execute($sql, [':id' => $this->id]);
    }
}