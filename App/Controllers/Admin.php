<?php

namespace App\Controllers;

use App\Classes\Controller;
use App\Exceptions\E404Exception;
use App\Models\Article;
use App\Models\Author;

class Admin
    extends Controller
{
    public function actionAdd()
    {
        $this->view->display('add.php');
    }

    public function actionSave()
    {
        try {
            $article = new Article();
            $article->fill($_POST);
            $authors = Author::findByColumn('name', $_POST['author']);
            if (!empty($authors)) {
                $article->author_id = $authors[0]->id;
            } else {
                $author = new Author();
                $author->name = $_POST['author'];
                $author->save();
                $article->author_id = $author->id;
            }
            $article->save();
            header('Location: /news/all');
        } catch (\MultiException $e) {
            $this->view->errors = $e;
            $this->view->fill($_POST);
            $this->view->display('add.php');
        }
    }

    public function actionEdit()
    {
        $id = $_GET['id'];
        $article = Article::findById($id);
        if (false == $article) {
            throw new E404Exception('запрашиваемая новость не найдена.');
        }
        $this->view->article = $article;
        if (empty($_POST)) {
            $this->view->display('edit.php');
        } else {
            try {
                $article->fill($_POST);
                $article->save();
                header('Location: /news/all');
            } catch (\MultiException $e) {
                $this->view->errors = $e;
                $this->view->display('edit.php');
            }
        }
    }

    public function actionDelete()
    {
        $id = $_GET['id'];
        $article = Article::findById($id);
        if (false == $article) {
            throw new E404Exception('запрашиваемая новость не найдена.');
        }
        $article->delete();
        header('Location: /news/all');
    }
}