<?php
namespace Controllers\CategoryController;

function indexAction($route)
{
    \Core\Model\construct($route, 'Категории');

    // # логика приложения

    \Core\View\render($route);
}
