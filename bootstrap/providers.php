<?php

use App\Providers\AdminServiceProvider;
use App\Providers\AppServiceProvider;
use App\Providers\CatalogServiceProvider;
use App\Providers\KitchenServiceProvider;
use App\Providers\OrderingServiceProvider;
use App\Providers\PaymentsServiceProvider;
use App\Providers\ReportingServiceProvider;

return [
    AdminServiceProvider::class,
    AppServiceProvider::class,
    CatalogServiceProvider::class,
    KitchenServiceProvider::class,
    OrderingServiceProvider::class,
    PaymentsServiceProvider::class,
    ReportingServiceProvider::class,
];
