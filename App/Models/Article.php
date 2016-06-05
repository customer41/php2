<?php

namespace App\Models;

use App\Classes\Model;

/**
 * Class Article
 *
 * @property $author
 *
 */
class Article
    extends Model
{
    protected static $table = 'news';

    public $title;
    public $lead;
    public $author_id;

    public function __get($prop) {
        if (!empty($this->author_id) && 'author' == $prop) {
            return Author::findById($this->author_id);
        }
        return null;
    }
}