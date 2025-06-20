<?php
class Route {
    protected static $routes = [];

    public static function get($uri, $action) {
        self::$routes['GET'][$uri] = $action;
    }

    public static function post($uri, $action) {
        self::$routes['POST'][$uri] = $action;
    }

   public static function dispatch($method, $requestUri) {
    $parsedUri = parse_url($requestUri, PHP_URL_PATH);

    // Loại bỏ thư mục gốc nếu có
    $scriptName = dirname($_SERVER['SCRIPT_NAME']);
    $cleanUri = '/' . trim(str_replace($scriptName, '', $parsedUri), '/');
    $cleanUri = '/' . trim($cleanUri, '/');

    // echo "Method: $method, URI: $cleanUri"; // Debug thông tin route

    if (isset(self::$routes[$method][$cleanUri])) {
        $action = self::$routes[$method][$cleanUri];
        self::callAction($action);
    } else {
        http_response_code(404);
        echo "404 - Not Found: $cleanUri";
    }
}

 protected static function callAction($action) {
        list($controllerPath, $methodName) = explode('@', $action);

        // Tìm đường dẫn file controller
        $controllerFile = __DIR__ . '/../app/controllers/' . $controllerPath . '.php';
        if (!file_exists($controllerFile)) {
            die("Lỗi :$controllerFile");
        }

        require_once $controllerFile;

        // Tên class là phần cuối cùng sau dấu `/`
        $parts = explode('/', $controllerPath);
        $className = end($parts); // vd: 'authcontroller'

        if (!class_exists($className)) {
            die("Lỗi $className - $controllerFile");
        }

        $controller = new $className();

        if (!method_exists($controller, $methodName)) {
            die("Lỗi $methodName - $className");
        }

        // Gọi phương thức
        $controller->$methodName();
    }

    // protected static function callAction($action) {
    //     list($controllerName, $methodName) = explode('@', $action);
    //     $controller = new $controllerName;
    //     $controller->$methodName();
    // }
}
