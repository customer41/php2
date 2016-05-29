<?php

require __DIR__ . '/../classes/Model.php';

class Article
    extends Model
{

    protected static $table = 'news';

    public $title;
    public $lead;

}