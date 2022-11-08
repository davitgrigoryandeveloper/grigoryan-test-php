<?php

// you need to uncomment this to work with the database․
$app->withEloquent();

// and uncomment the ones below․
$app->register(App\Providers\AppServiceProvider::class);
$app->register(App\Providers\AuthServiceProvider::class);
$app->register(App\Providers\EventServiceProvider::class);

// if we installed "lumen-generator" to have access to "php artisan" commands, this code needs to be uncommented․
$app->register(Flipbox\LumenGenerator\LumenGeneratorServiceProvider::class);

