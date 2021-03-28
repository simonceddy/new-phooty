<?php
namespace Phooty\Support;

use Phooty\Config;

class ConfigFactory
{
    public function load($paths = [])
    {
        $values = [];
        if (isset($paths)) {
            // if config is not null attempt to load config files
            $values = array_merge_recursive(
                $values,
                $this->loadValues($paths)
            );
        }

        return new Config($values);
        // else use default config values
    }
    
    protected function pathToKey(string $path)
    {
        $hasExt = strrpos($path, ".");

        if (is_int($hasExt)) {
            $path = substr($path, 0, $hasExt);
        }

        return basename($path);
    }

    protected function loadFile(string $path)
    {
        $ext = substr(strrchr($path, "."), 1);
        // dd($ext);
        switch ($ext) {
            case 'php':
                return safeInclude($path);
            case 'json':
                return json_decode(file_get_contents($path), true);
            // case 'yaml':
            // case 'yml':
            //     return Yaml::parseFile($path);
            default:
                return null;
        }
    }

    protected function loadDir(string $path)
    {
        $files = scandir($path);

        $values = [];

        foreach ($files as $name) {
            if ($name !== '.' && $name !== '..') {
                $values[$this->pathToKey($name)] = is_dir(
                    $full = $path . DIRECTORY_SEPARATOR . $name
                ) ? $this->loadDir($full) : $this->loadFile($full);
                // load file
            }
        }

        return $values;
    }

    protected function loadPath(string $path)
    {
        if (is_dir($path)) {
            return $this->loadDir($path);
        } elseif (file_exists($path)) {
            return $this->loadFile($path);
        }
        return null;
    }

    protected function loadValues($paths = [])
    {
        $values = [];

        if (is_string($paths)) {
            $values = $this->loadPath($paths);
        } elseif (is_array($paths)) {
            foreach ($paths as $path) {
                $values = array_merge_recursive($values, $this->loadPath($path));
            }
        }

        return $values;
    }

    public static function __callStatic($name, $arguments)
    {
        if ($name === 'load') {
            return (new static())->load($arguments);
        }

        throw new \BadMethodCallException();
    }
}

function safeInclude(string $filename) {
    return include $filename;
}
