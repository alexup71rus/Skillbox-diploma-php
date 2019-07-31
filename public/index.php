<?php

// общие настройки
ini_set('display_errors', 1); // 1 | 0
error_reporting(E_ALL); // E_ALL | E_COMPILE_ERROR

const ROOT = __DIR__ . '/../';
const APP = __DIR__ . '/../app';
const CONTROLLERS = __DIR__ . '/../app/controllers';
const MODELS = __DIR__ . '/../app/models';
const VIEWS = __DIR__ . '/../app/views';

require_once APP . '/config.php';
require_once APP . '/core/bootstrap.php';
