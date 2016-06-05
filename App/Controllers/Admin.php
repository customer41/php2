<?php

namespace App\Controllers;

use App\Classes\Controller;
use App\Models\Article;
use App\Models\Author;

class Admin
    extends Controller
{
    public function actionAdd() {
        if (empty($_POST)) {
            $this->view->display('add.php');
        } else {
            $title = $_POST['title'];
            $lead = $_POST['lead'];
            $author = $_POST['author'];
            if ('' == $title || '' == $lead || '' == $author) {
                $this->view->title = $title;
                $this->view->lead = $lead;
                $this->view->author = $author;
                $this->view->error = 'Заполните все поля!';
                $this->view->display('add.php');
            } else {
                $article = new Article();
                $article->title = $title;
                $article->lead = $lead;
                $authors = Author::findByColumn('name', $author);
                if (!empty($authors)) {
                    $article->author_id = $authors[0]->id;
                } else {
                    $a = new Author();
                    $a->name = $author;
                    $a->save();
                    $article->author_id = $a->id;
                }
                $article->save();
                header('Location: /news/all');
            }
        }
    }

    public function actionEdit() {
        $id = $_GET['id'];
        $article = Article::findById($id);
        $this->view->article = $article;
        if (empty($_POST)) {
            if ($article != false) {
                $this->view->display('edit.php');
            } else {
                header('Location: /news/all');
            }
        } else {
            $title = $_POST['title'];
            $lead = $_POST['lead'];
            if ('' == $title || '' == $lead) {
                $this->view->error = 'Заполните все поля!';
                $this->view->display('edit.php');
            } else {
                $article->title = $title;
                $article->lead = $lead;
                $article->save();
                header('Location: /news/all');
            }
        }
    }

    public function actionDelete() {
        $id = $_GET['id'];
        $article = Article::findById($id);
        if (false != $article) {
            $article->delete();
        }
        header('Location: /news/all');
    }
}