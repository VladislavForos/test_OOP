<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 03.08.2016
 * Time: 16:48
 */
    class View
    {
        private $model;
        private $controller;
        private $mainPath;

        function __construct($controller, $model)
        {
            $this->controller = $controller;
            $this->model = $model;
            $this->mainPath = "http://localhost/testing/";
        }

        function ShowTemplate($path)
        {
            include_once "$this->mainPath$path";
        }

        function ShowNews($arrayNews)
        {
            


        }
    }
?>