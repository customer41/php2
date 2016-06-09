<?php

namespace App\Classes;

use \App\Exceptions\DbException;

class Db
{
    protected $dbh;

    public function __construct()
    {
        $cfg = Config::getInstance();
        $dsn = $cfg->data['driver'] . ':host=' . $cfg->data['db']['host'] . ';dbname=' . $cfg->data['db']['dbname'];
        $this->dbh = new \PDO($dsn, $cfg->data['db']['user'], $cfg->data['db']['pass']);
    }

    public function query($sql, $params=[], $class='')
    {
        $sth = $this->dbh->prepare($sql);
        $result = $sth->execute($params);
        if (false == $result) {
            throw new DbException('не удалось выполнить запрос к БД.');
        }
        if (empty($class)) {
            return $sth->fetchAll();
        } else {
            return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        }
    }

    public function execute($query, $params=[])
    {
        $sth = $this->dbh->prepare($query);
        $result = $sth->execute($params);
        if (false == $result) {
            throw new DbException('не удалось выполнить запрос к БД.');
        }
        return $result;
    }

    public function insertId()
    {
        return $this->dbh->lastInsertId();
    }
}