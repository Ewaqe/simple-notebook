<?php

namespace Core;

/**
 * Config class loads sensitivity data from config.ini
 */
class Config {
    public $config;
    
    /**
     * __construct method parses config.ini file during class initialization
     *
     * @return void
     */
    public function __construct() {
       $this->config = parse_ini_file('config.ini', true);
    }
}