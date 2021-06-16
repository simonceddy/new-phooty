<?php

if (!function_exists('projectRoot')) {
    /**
     * Attempts to locate the project's root directory.
     *
     * @return string
     */
    function projectRoot()
    {
        $current = dirname(__DIR__);

        while ((!file_exists($current . '/composer.json')
            || !file_exists($current . '/vendor/autoload.php'))
            && $current !== ($next = dirname($current))
        ) {
            $current = $next;
        }

        return $current;
    }
}
