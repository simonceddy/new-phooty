<?php
namespace Phooty\Support;

class PhootyDir
{
    private string $homepath;

    public function __construct()
    {
        /* if (!isset($_SERVER['HOME'])) {
            throw new \Exception('Could not locate home dir.');
        } */

        $this->homepath = $_SERVER['HOME'] ?? projectRoot();
    }

    public function __toString()
    {
        return $this->homepath . DIRECTORY_SEPARATOR . '.phooty';
    }
}
