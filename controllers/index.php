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

        private function handlerGetPageNum($pageNumber)
        {
            $arr = $this->model->getNews($pageNumber);
            $this->view->showTemplate("templates/newsTemplate.php", $this->model->pageNumber, $arr);
        }

        function handlerGet($get)
        {
                $getKey = key($get);
                switch ($getKey)
                {
                    case 'page_num': $this->handlerGetPageNum($get['page_num']);
                        break;

                    default:    $this->handlerGetPageNum(firstPage);
                }
        }
    }

    $model = new NewsModel($_db);
    $view = new NewsView();
    $controller = new NewsController($model, $view);

    if (isset($_GET))
    {
        $controller->handlerGet($_GET);
    }
    else
    {
        $this->HandlerGetPageNum(firstPage);
    }

