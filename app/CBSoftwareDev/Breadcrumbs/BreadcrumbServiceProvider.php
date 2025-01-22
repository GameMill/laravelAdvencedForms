<?php

namespace App\CBSoftwareDev\Breadcrumbs;

use App\CBSoftwareDev\Breadcrumbs\Facades\Breadcrumbs;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BreadcrumbServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Register Manager class singleton with the app container
        $this->app->singleton(BreadcrumbsGenerator::class, BreadcrumbsGenerator::class);

    }

    public function provides() {
        return [BreadcrumbsGenerator::class];
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Blade::component('breadcrumbs', \App\CBSoftwareDev\Breadcrumbs\View\Components\BreadcrumbsComponent::class);
        $this->loadViewsFrom(__DIR__ . '/View/', 'breadcrumbs');

    }
}
