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

        function handlerGetPageNum($pageNumber)
        {
            $arr = $this->model->getNews($pageNumber);
            $this->view->showTemplate("templates/newsTemplate.php", $this->model->pageNumber, $arr);
        }

        function handlerGet()
        {
            if (isset($_GET))
            {
                $get = key($_GET);
                switch ($get)
                {
                    case 'page_num': $this->handlerGetPageNum($_GET['page_num']); 
                        break;

                    default:    $this->handlerGetPageNum(1);
                }
            }
            else
            {
                 $this->HandlerGetPageNum(1);
            }

        }
    }

    $model = new NewsModel($_db);
    $view = new NewsView();
    $controller = new NewsController($model, $view);

    $controller->handlerGet();

