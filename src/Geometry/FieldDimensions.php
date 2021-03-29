<?php
namespace Phooty\Geometry;

final class FieldDimensions
{
    public function __construct(private int $width, private int $length)
    {}

    /**
     * Get the field width
     * 
     * @return int
     */ 
    public function width()
    {
        return $this->width;
    }

    /**
     * Get the field length
     * 
     * @return int
     */ 
    public function length()
    {
        return $this->length;
    }

    public function get()
    {
        return [
            $this->width,
            $this->length,
        ];
    }

    public function __get($name)
    {
        switch ($name) {
            case 'width':
                return $this->width;
            case 'length':
                return $this->length;
        }

        throw new \Exception(
            "Unknown property: {$name}"
        );
    }
}
