<?php
namespace Phooty\Support;

class FootyFaker
{
    private array $cache = [];

    public function __construct(private CSVData $data)
    {
    }

    private function getRandomData(string $type) {
        if (!isset($this->cache[$type])) {
            try {
                $this->cache[$type] = $this->data->load($type);
            } catch (\Throwable $e) {
                throw $e;
            }
        }

        return $this->cache[$type][
            array_rand($this->cache[$type])
        ];
    }

    public function firstName()
    {
        return $this->getRandomData('firstNames');
    }

    public function surname()
    {
        return $this->getRandomData('surnames');
    }

    public function name(bool $asString = false)
    {
        return $asString ? ($this->firstName() . ' ' . $this->surname()) : [
            $this->firstName(),
            $this->surname()
        ];
    }

    public function city()
    {
        return $this->getRandomData('cities');
    }

    public function teamName()
    {
        return $this->getRandomData('teamNames');
    }
}
