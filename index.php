<?php
session_start();

require_once 'core/Route.php';
require_once 'core/Controller.php';
require_once 'core/Model.php';
require_once 'config.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Auto load
spl_autoload_register(function ($class) {
    foreach (['app/Controllers/', 'app/Models/', 'core/'] as $dir) {
        $file = $dir . $class . '.php';
        if (file_exists($file)) require_once $file;
    }
});

require_once 'routes/web.php';

Route::dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);

