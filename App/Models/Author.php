<?php

namespace App\Models;

use App\Classes\Model;

class Author
    extends Model
{
    protected static $table = 'authors';
    public $name;
}