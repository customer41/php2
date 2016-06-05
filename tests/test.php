<?php

$db = new \App\Classes\Db();
$sql = "INSERT INTO news (title, lead) VALUES (:title, :lead)";
$res = $db->execute($sql, [':title' => 'Ещё одна новость', ':lead' => 'Описание этой новости']);
var_dump($res);