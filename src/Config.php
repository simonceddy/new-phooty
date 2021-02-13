<?php
namespace Phooty;

class Config
{
    public function __construct(private array $values = [])
    {
    }

    private function resolveRecursively(string $key, array $values)
    {
        $bits = explode('.', $key);

        foreach ($bits as $bit) {
            $values = $this->resolveFrom($bit, $values);

            if (!is_array($values)) {
                return $values;
            }
        }

        return $values;
    }

    private function resolveFrom(string $key, array $values = [])
    {
        !empty($values) ?: $values = &$this->values;

        if (array_key_exists($key, $values)) {
            return $values[$key];
        }

        if (strpos($key, '.') !== false) {
            return $this->resolveRecursively($key, $values);
        }

        return null;
    }

    public function get(string $key = null)
    {
        if ($key === null) {
            return $this->values;
        }
        // resolve nested keys
        return $this->resolveFrom($key);
    }
}
