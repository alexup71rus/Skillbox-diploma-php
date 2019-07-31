<?php

namespace Core\View;

/**
 * рендер страницы
 */
function render(array $route, string $layout = \Config\Template\LAYOUT)
{
    $state = \Core\Model\state();
    $fileView = APP . '/views/' . $route['controller'] . '/' . $route['action'] . '.php';
    ob_start();
    if (is_file($fileView)) {
        require $fileView;
    } else {
        echo 'Файл представления не найден';
    }
    $content = ob_get_clean();
    $filelayout = APP . '/views/layouts/' . $layout . '.php';
    if (is_file($filelayout)) {
        require $filelayout;
    } else {
        echo 'Шаблон не найден';
    }
    return false;
}


