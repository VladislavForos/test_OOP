<?php
    include '../core.php';
    include'../models/newsModel.php';
    include'../templates/template.php';

    class Controller
    {
        private $model;

        function __construct($model)
        {
            $this->model = $model;
        }
    }

    $model = new Model();
    $controller = new Controller($model);
    $view = new View($controller, $model);
?>

