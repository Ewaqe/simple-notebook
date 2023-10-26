<?php

namespace Core;

/**
 * Controller class defines the business logic. Links the model and view
 */
abstract class Controller
{    
    /**
     * Route parameters
     *
     * @var array
     */
    protected array $route_params = [];
    
    /**
     * __construct method initializes route parameters
     *
     * @param  array $route_params
     * @return void
     */
    public function __construct(array $route_params)
    {
        $this->route_params = $route_params;
    }
    
    /**
     * __call method determines which method will be called in the inheritor class
     *
     * @param  string $name
     * @param  mixed $args
     * @return void
     */
    public function __call(string $name, $args)
    {
        $method = $name;
        if (method_exists($this, $method)) {
            call_user_func_array([$this, $method], $args);
        } else {
            throw new \Exception("That method $method doesn't exist in controller " . get_class($this));
        }
    }
}