<?php
require 'vendor/autoload.php';

$config = include 'config/dev.php';

// dd($config);

$kernel = Phooty\Factory::create();

$kernel->run();
