<?php
namespace Controllers\MainController;

function ajaxAction($route)
{
    if (isset($route['method'])) {
        echo $route['method'];
    } else {
        echo 'Не получен метод запроса';
    }
}

function indexAction($route)
{
    \Core\Model\construct($route, 'Fashion - интернет-магазин');

    // # логика приложения

    \Core\View\render($route);
}
