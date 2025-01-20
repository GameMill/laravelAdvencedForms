<?php

use App\Http\Controllers\Project_Catagories;
use App\Http\Controllers\TestForm;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', [TestForm::class,"index"]);

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


function MakeRoute(string $name,string $class)
{
    Route::get($name,[$class, 'index']);
    Route::get($name."/create",[$class, 'create']);
    Route::post($name."/create",[$class, 'store']);
    Route::get($name."/delete/{catagory}",[$class, 'destroy']);
    Route::get($name."/edit/{catagory}",[$class, 'edit']);
    Route::post($name."/edit/{catagory}",[$class, 'update']);

}