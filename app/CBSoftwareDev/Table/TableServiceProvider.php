<?php

namespace App\CBSoftwareDev\Table;


use App\CBSoftwareDev\Table\Components\TableComponent;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;


class TableServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Register Manager class singleton with the app container
        $this->app->singleton(Table::class, Table::class);
        

    }   

    public function provides() {
        return [Table::class];
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Blade::component('table-view', TableComponent::class);
        $this->loadViewsFrom(__DIR__ . '/Views/', 'table');


    }
}
