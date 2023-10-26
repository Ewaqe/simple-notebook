<?php

namespace Core;

/**
 * View class displays an html page
 */
class View
{        
    /**
     * Render page with base template
     *
     * @param  string $title
     * @param  string $endpointPath
     * @param  mixed  $data
     * @return void
     */
    public static function renderTemplate(string $title, string $endpointPath, array $data = NULL) : void {
        require_once "App\\Views\\base.php";
    }
}