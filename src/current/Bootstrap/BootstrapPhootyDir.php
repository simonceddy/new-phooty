<?php
namespace Phooty\Bootstrap;

use Phooty\Support\PhootyDir;

class BootstrapPhootyDir
{
    public function init(PhootyDir $dir)
    {
        // dd(php_sapi_name());
        if (php_sapi_name() === 'cli') {
            if (!file_exists($dir)) {
                mkdir($dir);
            }
            if (!file_exists($dir . '/cache')) {
                mkdir($dir . '/cache');
            }
        }

        return $dir;
    }
}
