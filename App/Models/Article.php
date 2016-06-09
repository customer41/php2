<?php

namespace App\Models;

use App\Classes\Model;
use App\Exceptions\MultiException;

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

    public function fill($data) {
        $errors = new MultiException();

        if (empty($data['title'])) {
            $errors->add(new \Exception('Пустой заголовок'));
        }
        if (empty($data['lead'])) {
            $errors->add(new \Exception('Пустой текст новости'));
        }
        if (empty($data['author'])) {
            $errors->add(new \Exception('Отсутствует автор новости'));
        }

        if (0 != count($errors)) {
            throw $errors;
        }

        parent::fill($data);
    }
}