<?php
namespace Router;

/**
 * хранит маршруты
 * @param указатель на нужную таблицу
 */
function &routes()
{
    static $routes = [];
    return $routes;
}

/**
 * хранит маршруты
 * @param указатель на нужную таблицу
 */
function &route(array $var = [])
{
    static $route = [];
    if ($var) {
        $route = $var;
    }
    return $route;
}

/**
 * безопасно добавляет путь
 */
function add(string $key = null, array $route = [])
{
    $routes = &routes();
    $routes[$key] = $route;
    return true;
}

/**
 * ищет url в таблице маршрутов
 */
function matchRoute(string $url)
{
    $routes = routes();
    foreach ($routes as $pattern => $route) {
        if (preg_match("#$pattern#i", $url, $matches)) {
            foreach ($matches as $key => $value) {
                if (is_string($key)) {
                    $route[$key] = $value;
                }
            }
            if (! isset($route['action'])) {
                $route['action'] = 'index';
            }
            route($route);
            return true;
        }
    }
    return false;
}

/**
 * направлеят url на маршрут
 */
function dispatch(string $url) {
    if (isset($url[0]) && $url[0] == '/') {
        $url = ltrim($url, '/');
    }
    if (matchRoute($url)) {
        $route = route();
        $controller = \Core\Model\upperCamelCase($route['controller']);
        $action = \Core\Model\lowerCamelCase($route['action']);
        if (@include_once APP.'/controllers/' . $controller . 'Controller.php') {
            if (function_exists('\\Controllers\\' . $controller . 'Controller\\' . $action . 'Action')) {
                call_user_func('\\Controllers\\' . $controller . 'Controller\\' . $action . 'Action', $route);
            } else {
                header('HTTP/1.1 404 Not Found');
                include APP . '/views/404.php';
            }
        } else {
            header('HTTP/1.1 404 Not Found');
            include APP . '/views/404.php';
        }
    } else {
        header('HTTP/1.1 404 Not Found');
        include APP . '/views/404.php';
    }
}

/**
 * запуск маршрутизатора
 */
function run()
{
    dispatch(urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));
};
