<?php
    require_once '../core.php';
    require_once '../models/newsModel.php';
    require_once '../views/newsView.php';

    class NewsController
    {
        private $model;
        private $view;

        function __construct($model, $view)
        {
            $this->model = $model;
            $this->view = $view;
        }

        function HandlerGetNum()
        {
            $arr = $this->model->GetNews();
            $this->view->ShowTemplate("templates/newsTemplate.php", $this->model->positionFirstNews, $this->model->count_news_on_page, $arr);
        }

        function HandlerGet()
        {
            if (isset($_GET))
            {
                $get = key($_GET);
                switch ($get)
                {
                    case 'num': $this->model->SetPositionFirstNew($_GET[$get]); $this->HandlerGetNum();
                        break;

                    default:    $this->model->SetPositionFirstNew(0); $this->HandlerGetNum();
                }
            }
            else
            {
                $this->model->SetPositionFirstNew(0); $this->HandlerGetNum();
            }

        }
    }

    $model = new NewsModel();
    $view = new View();
    $controller = new NewsController($model, $view);

    $controller->HandlerGet();
?>

