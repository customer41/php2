<?php

namespace App\Controllers;

use App\Classes\Controller;
use App\Models\Article;

class News
    extends Controller
{
    public function actionAll() {
        $articles = Article::findLast(3);
        $this->view->articles = $articles;
        $this->view->display('index.php');
    }

    public function actionOne() {
        $id = $_GET['id'];
        $article = Article::findById($id);
        $this->view->article = $article;
        $this->view->display('article.php');
    }
}
