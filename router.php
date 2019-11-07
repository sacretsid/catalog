<?php


/**
 * Class Router
 */
class Router
{
    /** @var string Default controller's method */
    public static $DefaultMethod = 'index';
    /** @var string Application name */
    public static $ApplicationName;

    public static function start()
    {
        $routes = explode('/', $_SERVER['REQUEST_URI']);

        array_shift($routes);
        $applicationPart = self::getFormattedPart($routes);
        $controllerPart  = self::getFormattedPart($routes);
        $methodPart      = self::getFormattedPart($routes);

        $controllerPath = self::getControllerPath($applicationPart, $controllerPart);
        $controllerFile = strtolower(implode('/', $controllerPath)) . '.php';
        $controllerName = implode('\\', $controllerPath);
        $methodName     = self::getMethodName($methodPart);

        if (!file_exists($controllerFile)) {
            $controllerPath = self::getControllerPath($applicationPart, $applicationPart);
            $controllerFile = strtolower(implode('/', $controllerPath)) . '.php';
            $controllerName = implode('\\', $controllerPath);
            $methodName     = self::getMethodName($controllerPart);

            if (!file_exists($controllerFile)) {
                self::page404();
            }
        }

        $controller = new $controllerName;
        if (method_exists($controller, $methodName)) {
            self::setApplicationName($applicationPart);
            call_user_func_array(array($controller, $methodName), $routes);
        } else {
            self::page404();
        }
    }

    public static function page404()
    {
    }

    /**
     * @return string
     */
    public static function getApplicationName()
    {
        return self::$ApplicationName;
    }

    /**
     * @param string $applicationPart
     */
    private static function setApplicationName(string $applicationPart = '')
    {
        self::$ApplicationName = ucfirst($applicationPart);
    }

    /**
     * @param array $routes
     * @return string
     */
    private static function getFormattedPart(array &$routes)
    {
        return strtolower((string)array_shift($routes));
    }

    /**
     * @param string $application
     * @param string $controller
     * @return array
     */
    private static function getControllerPath(string $application, string $controller = '')
    {
        $controllerPath = [];

        $controllerPath[] = 'Application';
        $controllerPath[] = ucfirst($application);
        $controllerPath[] = 'Controllers';
        $controllerPath[] = ucfirst($controller) . 'Controller';

        return $controllerPath;
    }

    /**
     * @param string $methodName
     * @return string
     */
    private static function getMethodName(string $methodName)
    {
        if (empty($methodName)) {
            $methodName = self::$DefaultMethod;
        }

        return $methodName;
    }
}