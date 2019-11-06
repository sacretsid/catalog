<?php


/**
 * Class Router
 */
class Router
{
    public $DefaultMethod = 'index';

    public function start()
    {
        $routes = explode('/', $_SERVER['REQUEST_URI']);

        array_shift($routes);
        $applicationPart = (string)array_shift($routes);
        $controllerPart  = (string)array_shift($routes);
        $methodPart      = (string)array_shift($routes);

        $controllerPath = $this->getControllerPath($applicationPart, $controllerPart);
        $controllerFile = strtolower(implode('/', $controllerPath)) . '.php';
        $controllerName = implode('\\', $controllerPath);
        $methodName = $this->getMethodName($methodPart);

        if (!file_exists($controllerFile)) {
            $controllerPath = $this->getControllerPath($applicationPart, $applicationPart);
            $controllerFile = strtolower(implode('/', $controllerPath)) . '.php';
            $controllerName = implode('\\', $controllerPath);
            $methodName = $this->getMethodName($controllerPart);

            if (!file_exists($controllerFile)) {
                $this->page404();
            }
        }

        $controller = new $controllerName;
        if (method_exists($controller, $methodName)) {
            call_user_func_array(array($controller, $methodName), $routes);
        } else {
            $this->page404();
        }
    }

    public function page404()
    {
    }

    /**
     * @param string $application
     * @param string $controller
     * @return array
     */
    private function getControllerPath(string $application, string $controller = '')
    {
        $controllerPath = [];

        $controllerPath[] = 'Application';
        $controllerPath[] = ucfirst(strtolower($application));
        $controllerPath[] = 'Controllers';
        $controllerPath[] = ucfirst(strtolower($controller)) . 'Controller';

        return $controllerPath;
    }

    /**
     * @param string $method
     * @return string
     */
    private function getMethodName(string $method)
    {
        $methodName = strtolower($method);
        if (empty($methodName)) {
            $methodName = $this->DefaultMethod;
        }

        return $methodName;
    }
}