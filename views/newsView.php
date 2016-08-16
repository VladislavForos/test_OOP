<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 03.08.2016
 * Time: 16:48
 */
    class NewsView
    {
        function __construct()
        {
        }

        function showTemplate($path, $pageNumber, $data = null)
        {
            include_once "../$path";
        }
    }