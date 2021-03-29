<?php
namespace Phooty\Entities;

class Position
{
    public function __construct(
        private string $type,
        private TeamPlayer $teamPlayer
    ) {
        // TODO: write logic here
    }

    public function type()
    {
        return $this->type;
    }

    /**
     * Get the Player object
     * 
     * @return Player
     */ 
    public function player()
    {
        return $this->teamPlayer->player();
    }

    public function team()
    {
        return $this->teamPlayer->team();
    }

    public function __call(string $name, array $args)
    {
        if (method_exists($this->teamPlayer, $name)) {
            return call_user_func_array([$this->teamPlayer, $name], $args);
        }

        throw new \BadMethodCallException();
    }
}
