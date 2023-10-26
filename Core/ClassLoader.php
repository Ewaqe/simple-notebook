<?php

namespace Core;

/**
 * ClassLoader class automatically includes all classes that are accessed in the project
 */
class ClassLoader
{    
    /**
     * Magical method run includes the class to which you need to access
     *
     * @return void
     */
    public function run() : void {
        spl_autoload_register( function ($className) {
            $className = ltrim($className, '\\');
            $fileName  = '';
            $namespace = '';
            if ($lastNsPos = strrpos($className, '\\')) {
                $namespace = substr($className, 0, $lastNsPos);
                $className = substr($className, $lastNsPos + 1);
                $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
            }
            $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
        
            require $fileName;
        });
    }
}
