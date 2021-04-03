<?php
$app = new Pimple\Container();

$app->register(new Phooty\Support\Providers\PhootyProviders());

return $app;
