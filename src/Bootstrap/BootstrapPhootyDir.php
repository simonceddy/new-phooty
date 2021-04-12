<?php
namespace Phooty\Bootstrap;

use Phooty\Support\PhootyDir;

class BootstrapPhootyDir
{
    public function init(PhootyDir $dir)
    {
        if (!file_exists($dir)) {
            mkdir($dir);
        }
        if (!file_exists($dir . '/cache')) {
            mkdir($dir . '/cache');
        }

        return $dir;
    }
}
