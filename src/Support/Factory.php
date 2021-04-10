<?php
namespace Phooty\Support;

interface Factory
{
    /**
     * Create the given amount of objects.
     *
     * @param int $amount The amount of objects to create.
     * @param array $attributes Additional options and default attributes
     *
     * @return mixed
     */
    public function make(int $amount = 1, array $attributes = []);
}
