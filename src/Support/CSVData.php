<?php
namespace Phooty\Support;

use Phooty\Exceptions\InvalidPathException;

class CSVData
{
    private array $locations;

    public function __construct(array $locations = [])
    {
        $this->locations = [
            ...$locations,
            projectRoot() . '/data',
        ];
    }

    public function load(string $filename)
    {
        strpos($filename, '.csv') ?: $filename .= '.csv';

        $i = 0;
        $locCount = count($this->locations);
        $current = $filename;
        while (!($resolved = file_exists($current)) && $i < $locCount) {
            $current = $this->locations[$i] . '/' . $filename;
            $i++;
        }

        if ($resolved) {
            return str_getcsv(file_get_contents($current));
        }

        throw new InvalidPathException();
    }

    public function __invoke(string $filename)
    {
        return $this->load($filename);
    }
}
