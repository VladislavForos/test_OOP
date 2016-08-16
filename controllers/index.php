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

        function handlerGetNum()
        {
            $arr = $this->model->getNews($numberPage);
            $this->view->showTemplate("templates/newsTemplate.php", $this->model->positionFirstNews, $this->model->count_news_on_page, $arr);
        }

        function handlerGet()
        {
            if (isset($_GET))
            {
                $get = key($_GET);
                switch ($get)
                {
                    case 'num': $this->model->setPositionFirstNew($_GET[$get]); $this->handlerGetNum();
                        break;

                    default:    $this->model->setPositionFirstNew(0); $this->handlerGetNum();
                }
            }
            else
            {
                $this->model->SetPositionFirstNew(0); $this->HandlerGetNum();
            }

        }
    }

    $model = new NewsModel($_db);
    $view = new NewsView();
    $controller = new NewsController($model, $view);

    $controller->handlerGet();

