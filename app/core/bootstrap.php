<?php
require_once APP . '/core/view.php';
require_once APP . '/core/model.php';
require_once APP . '/core/router.php';

Router\add('ajax/?(?P<method>[a-z-]+)?', ["controller" => "Main", "action" => "ajax"]);
Router\add('category/?(?P<alias>[a-z-]+)?', ["controller" => "Category", "action" => "index"]);
Router\add('(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?/?(?P<alias>[a-z-]+)?');

// добавляю базовые маршруты
Router\add('^$', ["controller" => "Main", "action" => "index"]);


// роутинг и запуск приложения
$routes = Router\run();




