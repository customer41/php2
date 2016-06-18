<?php

namespace App\Classes;

class AdminDataTable
{
    protected $models;
    protected $functions;
    protected $columns;
    
    public function __construct(array $models, array $functions)
    {
        $this->models = $models;
        $this->functions = $functions;
        $this->columns = array_keys($functions);
    }
    
    public function render()
    {
        $view = new View();
        $view->models = $this->models;
        $view->functions = $this->functions;
        $view->columns = $this->columns;
        return $view->render('table.php');
    }
}