<?php
namespace Phooty\Entities\Attributes;

use Phooty\Support\CanBecomeJSON;

class PlayerData implements \JsonSerializable, \Serializable
{
    use CanBecomeJSON;

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

    public function toArray()
    {
        return [
            'number' => $this->number,
            'givenNames' => $this->givenNames,
            'surname' => $this->surname,
        ];
    }

    public function serialize()
    {
        return serialize($this->toArray());
    }

    public function unserialize($serialized)
    {
        $data = unserialize($serialized);
        $this->number = $data['number'];
        $this->givenNames = $data['givenNames'];
        $this->surname = $data['surname'];
    }
}
