<?php
namespace Phooty\Support;

use Doctrine\Common\Cache\Cache;

class InitialSetup
{
    public function __construct(private Cache $cache)
    {}

    public function cache(\Serializable $object, $id)
    {
        $this->cache->save($id, $object);
    }

    public static function hasBeenRun()
    {
        return is_dir($_SERVER['HOME'] . '/.phooty/cache');
    }
}
