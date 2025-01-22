<?php

use App\CBSoftwareDev\Breadcrumbs\Breadcrumbs as BreadcrumbsGenerator;
use App\CBSoftwareDev\Breadcrumbs\Facades\Breadcrumbs;
use App\Http\Controllers\Project_Catagories;
use App\Http\Controllers\TestForm;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', [TestForm::class,"index"]);


Route::get('/testimage', [TestForm::class,"testimage"]);
Route::post('/testimage', [TestForm::class,"createimage"]);
Route::get('/testimage/{image}', [TestForm::class,"getimage"]);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    MakeRoute('categories', Project_Catagories::class);

});

Route::get('generate1251safasfasf2571625982517625621865795', function (){
    \Illuminate\Support\Facades\Artisan::call('storage:link');
    echo 'ok';
});

function MakeRoute(string $name,string $class)
{
    $tempName = str_replace("/","_", $name);
    Route::get($name,[$class, 'index'])->name($tempName);
    Route::get($name."/create",[$class, 'create'])->name($tempName."_create");
    Route::post($name."/create",[$class, 'store'])->name($tempName."_store");
    Route::get($name."/delete/{catagory}",[$class, 'destroy'])->name($tempName."_destroy");
    Route::get($name."/edit/{catagory}",[$class, 'edit'])->name($tempName."_edit");
    Route::post($name."/edit/{catagory}",[$class, 'update'])->name($tempName."_update");


}

// Home
Breadcrumbs::for('dashboard', function (BreadcrumbsGenerator $breadcrumbs) {
    $breadcrumbs->push('Home', route('dashboard'));
});

