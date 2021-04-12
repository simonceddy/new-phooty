<?php
namespace Phooty\Core\Engine\Players;

use Phooty\Entities\Footy;

class AwareOfFooty
{
    public function __construct(private Footy $footy)
    {}

    public function footy()
    {
        return $this->footy;
    }
}
