<?php
    require_once '../core.php';
    require_once '../models/newsModel.php';
    require_once '../views/newsView.php';

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


        $model->SetPositionFirstNew();
        $arr = $model->GetNews();
        $view->ShowTemplate("templates/template.php");

?>

