<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 03.08.2016
 * Time: 16:48
 */
    class View
    {
        function __construct()
        {
        }

        function ShowTemplate($path)
        {
            include_once "../$path";
        }
    }
?>