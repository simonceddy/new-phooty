<?php
namespace Phooty\Support;

class PlayerNumberGen
{
    private array $numbers = [];

    public function __construct()
    {
    }

    /**
     * Returns a random integer between $max and $min.
     * 
     * The number returned will be unique to this instance, unless the maximum
     * total numbers have been generated already, in which case this method
     * will begin to ignore previous numbers.
     *
     * @param int $max
     * @param int $min
     *
     * @return int
     */
    public function get(int $max = 64, int $min = 1)
    {
        $number = mt_rand($min, $max);
        while (isset($this->numbers[$number])
            && count($this->numbers) < $max
        ) {
            $number = mt_rand(1, 64);
        }
        $this->numbers[$number] = $number;

        return $number;
    }
}
