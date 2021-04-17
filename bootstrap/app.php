<?php
$app = new Pimple\Container();

$app->register(new Phooty\Support\Providers\Pimple\PhootyProviders());

return $app;
