<?php

namespace App\CBSoftwareDev\Breadcrumbs\Facades;

use App\CBSoftwareDev\Breadcrumbs\BreadcrumbsGenerator;
use Clockwork\Support\Laravel\Facade;
use Generator;

class Breadcrumbs extends Facade
{
    /**
     * Get the name of the class registered in the Application container.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return BreadcrumbsGenerator::class;
    }
}