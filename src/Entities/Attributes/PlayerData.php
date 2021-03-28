<?php
namespace Phooty\Entities\Attributes;

class PlayerData
{
    public function __construct(
        private int $number,
        private string $givenNames, 
        private string $surname
    ) {
    }

    /**
     * Get the players number
     */ 
    public function getNumber()
    {
            return $this->number;
    }

    /**
     * Get the players given name
     */ 
    public function getGivenName()
    {
            return $this->givenNames;
    }

    /**
     * Get the players surname
     */ 
    public function getSurname()
    {
            return $this->surname;
    }
}
