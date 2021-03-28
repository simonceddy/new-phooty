<?php
namespace Phooty\Entities\Attributes;

class TeamData
{
    private string $short;

    public function __construct(
        private string $city, 
        private string $name, 
        string $short = null
    ) {
        !isset($short) ?: $this->short = $short;
    }

    /**
     * Get the team city.
     * 
     * @return string
     */ 
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Get the team name
     * 
     * @return string
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the shorthand name.
     * 
     * @return string|null
     */ 
    public function getShort()
    {
        return isset($this->short) ? $this->short : null;
    }
}
