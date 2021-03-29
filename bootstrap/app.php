<?php
$app = new Pimple\Container();

$app->register(new Phooty\Support\Providers\CoreProvider());
$app->register(new Phooty\Support\Providers\DevProvider());

return $app;
