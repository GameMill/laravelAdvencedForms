<?php

return [
    App\Providers\AppServiceProvider::class,
    
    App\CBSoftwareDev\Breadcrumbs\BreadcrumbServiceProvider::class,
    App\CBSoftwareDev\Table\TableServiceProvider::class,

    App\Providers\FormServiceProvider::class,
    App\Providers\FortifyServiceProvider::class,
    App\Providers\JetstreamServiceProvider::class,
    Clockwork\Support\Laravel\ClockworkServiceProvider::class,
];
