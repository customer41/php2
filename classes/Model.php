<?php

require __DIR__ . '/Db.php';

abstract class Model
{

    protected static $table;

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

}