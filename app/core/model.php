<?php
namespace Core\Model;

/**
 * состояние страницы
 */
function &state()
{
    static $state = [];
    if (!$state) {
        $state = [
            'route' => [
                'controller' => 'Main',
                'action' => 'index',
            ],
            'layout' => \Config\Template\LAYOUT,
            'view' => 'index',
            'title' => '',
            'description' => '',
            'keywords' => '',
            'themeColor' => '',
        ];
    }
    return $state;
}

/**
 *
 */
function construct(array $route, string $title, string $layout = \Config\Template\LAYOUT)
{
    $state = &\Core\Model\state();
    $state = [
        'route' => $route,
        'layout' => $layout,
        'view' => 'index',
        'title' => $title,
        'description' => 'Fashion - интернет-магазин',
        'keywords' => 'Fashion, интернет-магазин, одежда, аксессуары',
        'themeColor' => '#393939',
        'menuItems' => [
            '/' => ['text' => 'Главная', 'href' => '/'],
            '/?filter=new' => ['text' => 'Новинки', 'href' => '/?filter=new'],
            '/?filter=sale' => ['text' => 'Sale', 'href' => '/?filter=sale'],
            '/delivery' => ['text' => 'Доставка', 'href' => '/delivery'],
        ],
    ];

    // логика ссылок В меню (нужно вынести в файл модели и сделать маппинг)
    if (isset($_GET['filter'])) {
        $filter = explode(',', $_GET['filter']);
        foreach ($filter as $value) {
            if (isset($state['menuItems']['/?filter=' . $value])) {
                $state['menuItems']['/?filter=' . $value]['isActive'] = true;
            }
        }
    } elseif (isset($state['menuItems'][$_SERVER['REQUEST_URI']])) {
        $state['menuItems'][$_SERVER['REQUEST_URI']]['isActive'] = true;
    }
}

/**
 *
 */
function upperCamelCase(string $string)
{
    return str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));
}

/**
 *
 */
function lowerCamelCase(string $string)
{
    return lcfirst(upperCamelCase($string));
}


