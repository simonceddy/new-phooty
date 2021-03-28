<?php

use Phooty\Support\Providers\CoreProvider;

$app = new Pimple\Container();

$app->register(new CoreProvider());

return $app;
