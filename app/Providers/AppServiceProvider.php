<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

require_once __DIR__ . "/../../CBSoftwareDev/Form/Form.php";
require_once __DIR__ . "/../../CBSoftwareDev/Form/Inputs/BaseInput.php";
require_once __DIR__ . "/../../CBSoftwareDev/Form/Inputs/TextInput.php";
require_once __DIR__ . "/../../CBSoftwareDev/Form/Inputs/Textarea.php";
require_once __DIR__ . "/../../CBSoftwareDev/Form/Style/Group.php";

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
