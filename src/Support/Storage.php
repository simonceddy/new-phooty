<?php
namespace Phooty\Support;

/**
 * Storage adapter interface
 *
 * TODO - may remove
 */
interface Storage
{
    public function store($data);

    public function load($data);

    public function locate($data);

    public function destroy($data);

    public function exists($data);
}
