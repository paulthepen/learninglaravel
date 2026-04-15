<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

/*
 * ==================== Routes =====================
 * You have several different ways to define routes:
 * 1. Route::get('/path', 'Controller@method');
 * 2. Route::get('/path', [Controller::class, 'method']);
 * 3. Route::get('/path', function() { return view('view'); });
 *
 * You also have different methods (get, post, put, patch, delete)
 *
 * Or you can call a view directly: Route::view('/path', 'view');
 *
 * ==================== Route Groups ==========================
 * You can create a route group to define a set of routes that share a common controller.
 * Route::controller(JobController::class->group(function() {
 *  Route::get('/jobs', 'index');
 *  Route::get('/jobs/create', 'create');
 *  Route::get('/jobs/{id}', 'show');
 *  Route::post('/jobs', 'store');
 *  Route::patch('/jobs/{id}', 'update');
 *  Route::delete('/jobs/{id}', 'destroy');
 *  });
 * });
 *
 * ================== Resource Controllers =====================
 *
 * Laravel has a resource controller that can be used to define routes for a resource.
 * https://laravel.com/docs/13.x/controllers#resource-controllers
 * Route::resource('resource', ResourceController::class);
 * This will create routes for index, create, store, show, edit, update, and destroy.
 * You can also specify which routes to include: Route::resource('resource', ResourceController::class, ['only' => ['index', 'show']]);
 * or exclude: Route::resource('resource', ResourceController::class, ['except' => ['edit']]);
 *
 * ================== Route Model Binding =====================
 * Route model binding allows you to bind a route parameter to a model.
 * https://laravel.com/docs/13.x/routing#route-model-binding
 * Route::get('/jobs/{job}', function (Job $job) {
 *  return $job;
 * });
 * You can also specify the fieldname to match on: Route::get('/jobs/{job:title}', function (Job $job) {
 *  return $job;
 * });
 * 1. wildcard: matches the parameter name
 * 2. parameter: has a type defined
 * Do this and the parameter will automatically be injected with the model instance.
 * =======================================================================*/

Route::view('/', 'home');
Route::view('/contact', 'contact');
//Jobs
Route::controller(JobController::class)->group(function() {
    Route::get('/jobs', 'index');
    Route::get('/jobs/create', 'create');
    Route::patch('/jobs/{id}', 'update');
    Route::post('/jobs', 'store');
    Route::delete('/jobs/{id}', 'destroy');
    Route::get('/jobs/{job:id}', 'show');
    Route::get('/jobs/{job}/edit', 'edit');
});



