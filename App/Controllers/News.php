<?php

namespace App\Controllers;

use App\Classes\Controller;
use App\Exceptions\E404Exception;
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
        if (false == $article) {
            throw new E404Exception('запрашиваемая новость не найдена.');
        }
        $this->view->article = $article;
        $this->view->display('article.php');
    }
}