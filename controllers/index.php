<?php
    require_once '../core.php';
    require_once '../models/newsModel.php';
    require_once '../views/newsView.php';

    class Controller
    {
        private $model;
        private $view;

        function __construct($model, $view)
        {
            $this->model = $model;
            $this->view = $view;
        }

        function HandlerOne()
        {
            if (isset($_GET['num']))
            {
                $this->model->SetPositionFirstNew($_GET['num']);
            }
            else
            {
                $this->model->SetPositionFirstNew(0);
            }

            $arr = $this->model->GetNews();
            $this->view->ShowTemplate("templates/newsTemplate.php", $this->model->positionFirstNews, $this->model->count_news_on_page, $arr);
        }

    }

    $model = new Model();
    $view = new View();
    $controller = new Controller($model, $view);

    $controller->HandlerOne();
?>

