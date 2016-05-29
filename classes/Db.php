<?php

require __DIR__ . '/Config.php';

class Db
{

    protected $dbh;

    public function __construct()
    {
        $cfg = \App\Config::getInstance();
        $dsn = $cfg->data['driver'] . ':host=' . $cfg->data['db']['host'] . ';dbname=' . $cfg->data['db']['dbname'];
        $this->dbh = new PDO($dsn, $cfg->data['db']['user'], $cfg->data['db']['pass']);
    }

    public function query($sql, $params=[], $class='')
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        if (empty($class)) {
            return $sth->fetchAll();
        } else {
            return $sth->fetchAll(PDO::FETCH_CLASS, $class);
        }
    }

    public function execute($query, $params=[])
    {
        $sth = $this->dbh->prepare($query);
        return $sth->execute($params);
    }

}