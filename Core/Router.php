<?php

namespace Core;

/**
 * Router class determines which page to display
 */
class Router 
{
    const CONTROLLERS_NAMESPACE = 'App\Controllers\\';
    
    /**
     * routes
     *
     * @var array
     */
    private $routes = [];    
    /**
     * params
     *
     * @var array
     */
    private $params = [];
    
    /**
     * Add routes to the array with routes
     *
     * @param  string $route
     * @param  array $params
     * @return void
     */
    public function add(string $route, array $params = []) : void {
        $route = $this->processRoute($route);

        $this->routes[$route] = $params;
    }
    
    /**
     * Magical method run determines which page to display
     *
     * @param  string $url
     * @return void
     */
    public function run(string $url) : void {
        $url = strtok($url, "?");
        if ($this->match($url)) {
            $controller = self::CONTROLLERS_NAMESPACE . $this->convertToPascalCase($this->params['controller']);
            if(class_exists($controller)) {
                $current_controller = new $controller($this->params);
                
                $action = $this->params['action'];
                $action = $this->convertToCamelCase($action);

                $current_controller->$action();
            }
            else {
                throw new \Exception("That controller class $controller doesn't exist");
            }
        }
        else {
            throw new \Exception('That route doesn\'t exist', 404);
        }
    }
    
    /**
     * match method checks if there is a url among existing routes
     *
     * @param  string $url
     * @return bool
     */
    private function match(string $url) : bool {
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches) && (array_key_exists("methods", $params) && in_array($_SERVER['REQUEST_METHOD'], $params["methods"]))) {
                foreach ($matches as $key => $match) {
                    if (is_string($key)) {
                        $params[$key] = $match;
                    }
                }
                $this->params = $params;
                return true;
            }
        }
        return false;
    }
    
    /**
     * processRoute method fixes slashes for regular expressions, adds case insensitivity
     *
     * @param  string $route
     * @return string
     */
    private function processRoute(string $route) : string {
        $route = preg_replace('/\//', '\\/', $route);
        $route = '/^' . $route . '$/i';
        
        return $route;
    }
    
    /**
     * convertToPascalCase method converts string to PascalCase style
     *
     * @param  string $string
     * @return string
     */
    private function convertToPascalCase(string $string) : string {
        return str_replace(' ', '', ucwords($string));
    }
    
    /**
     * convertToCamelCase method converts string to camelCase style
     *
     * @param  mixed $string
     * @return string
     */
    private function convertToCamelCase(string $string) : string {
        return lcfirst($this->convertToPascalCase($string));
    }
}