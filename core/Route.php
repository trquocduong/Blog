<?php
class Route
{
    protected static $routes = [];

    public static function get($uri, $action, $middleware = null)
    {
        self::$routes['GET'][$uri] = [
            'action' => $action,
            'middleware' => $middleware
        ];
    }

    public static function post($uri, $action, $middleware = null)
    {
        self::$routes['POST'][$uri] = [
            'action' => $action,
            'middleware' => $middleware
        ];
    }
    protected static function getPageBySlug($uri)
    {
        $slug = ltrim($uri, '/'); // bỏ dấu "/"
        require_once __DIR__ . '/../core/Database.php';
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare("SELECT * FROM pages WHERE slug = ?");
        $stmt->execute([$slug]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    protected static function renderDynamicPage($page)
    {
        extract($page); // tạo biến $title, $content từ array
        include 'app/Views/client/pages/show.php';
    }



    public static function dispatch($method, $requestUri)
    {
        $parsedUri = parse_url($requestUri, PHP_URL_PATH);

        $scriptName = dirname($_SERVER['SCRIPT_NAME']);
        $cleanUri = '/' . trim(str_replace($scriptName, '', $parsedUri), '/');
        $cleanUri = '/' . trim($cleanUri, '/');

        if (isset(self::$routes[$method][$cleanUri])) {
            $route = self::$routes[$method][$cleanUri];
            $action = $route['action'];
            $middleware = $route['middleware'] ?? null;

            if ($middleware) {
                require_once "core/$middleware.php";
                $middlewareClass = basename($middleware);
                if (class_exists($middlewareClass)) {
                    $middlewareClass::handle();
                }
            }

            self::callAction($action);
        } else {
            $page = self::getPageBySlug($cleanUri);
            if ($page) {
                self::renderDynamicPage($page);
            } else {
                http_response_code(404);
                require_once 'app/Views/client/errors/404.php';
            }
        }
    }


    protected static function callAction($action)
    {
        list($controllerPath, $methodName) = explode('@', $action);

        $controllerFile = __DIR__ . '/../app/controllers/' . $controllerPath . '.php';
        if (!file_exists($controllerFile)) {
            die("Không tìm thấy controller file: $controllerFile");
        }

        require_once $controllerFile;

        $parts = explode('/', $controllerPath);
        $className = end($parts);

        if (!class_exists($className)) {
            die("Không tìm thấy class `$className` trong $controllerFile");
        }

        $controller = new $className();

        if (!method_exists($controller, $methodName)) {
            die("Không tìm thấy method `$methodName` trong class `$className`");
        }

        $controller->$methodName();
    }
}
