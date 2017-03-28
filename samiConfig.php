<?php

use Sami\Sami;
use Symfony\Component\Finder\Finder;

$iterator = Finder::create()
    ->files()
    ->name('*.php')
    ->exclude('Tests')
    ->in(__DIR__.'/src/CSDT/CSR3');

return new Sami($iterator, array(
    'build_dir'            => __DIR__.'/docAPI',
    'cache_dir'            => __DIR__.'/cacheDocAPI',
));
