<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

require_once __DIR__ . "/../../CBSoftwareDev/Form/Form.php";
require_once __DIR__ . "/../../CBSoftwareDev/Form/Input/BaseInput.php";
require_once __DIR__ . "/../../CBSoftwareDev/Form/Input/TextInput.php";
require_once __DIR__ . "/../../CBSoftwareDev/Form/Input/Textarea.php";
require_once __DIR__ . "/../../CBSoftwareDev/Form/Input/Select.php";
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
