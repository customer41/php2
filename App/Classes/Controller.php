<?php

namespace App\Classes;

class Controller
{

    /**
     * @var \App\Classes\View
     */
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function action($action)
    {
        if (false == $this->access()) {
            echo 'access denied';
        } else {
            $this->$action();
        }
    }

    public function access()
    {
        return true;
    }
}