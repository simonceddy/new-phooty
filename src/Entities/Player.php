<?php
namespace Phooty\Entities;

use Phooty\Entities\Attributes\PlayerData;

class Player
{
    public function __construct(private PlayerData $data)
    {
        // TODO: write logic here
    }

    /**
     * Get the PlayerData object
     * 
     * @return PlayerData
     */ 
    public function data()
    {
        return $this->data;
    }
}
