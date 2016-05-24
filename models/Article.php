<?php

require __DIR__ . '/../classes/Model.php';

class Article
    extends Model
{

    protected static $table = 'news';

    public $id;
    public $title;
    public $lead;

}