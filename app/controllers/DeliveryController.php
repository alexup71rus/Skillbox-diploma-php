<?php
namespace Controllers\DeliveryController;

function indexAction($route)
{
    \Core\Model\construct($route, 'Доставка');
    
    // # логика приложения

    \Core\View\render($route);
}

