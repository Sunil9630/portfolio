<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/portfolio', [ProjectController::class, 'portfolio'])->name('portfolio');

Route::get('/project/{project:slug}', [ProjectController::class, 'show'])
    ->name('project.show');

Route::post('/contact', [ContactController::class, 'store'])
    ->name('contact.store');


/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'login'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'authenticate'])
        ->name('login.post');
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [AdminController::class, 'dashboard'])
            ->name('dashboard');

        /*
        |--------------------------------------------------------------------------
        | Resource Routes
        |--------------------------------------------------------------------------
        */

        Route::resource('projects', ProjectController::class);

        Route::resource('skills', SkillController::class);

        Route::resource('services', ServiceController::class);

        Route::resource('experiences', ExperienceController::class);

        Route::resource('testimonials', TestimonialController::class);

        Route::resource('blogs', BlogController::class);

        /*
        |--------------------------------------------------------------------------
        | Contacts
        |--------------------------------------------------------------------------
        */

        Route::get('/contacts', [ContactController::class, 'index'])
            ->name('contacts.index');

        Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])
            ->name('contacts.destroy');

        /*
        |--------------------------------------------------------------------------
        | Settings
        |--------------------------------------------------------------------------
        */

        Route::get('/settings', [SettingController::class, 'edit'])
            ->name('settings.edit');

        Route::put('/settings', [SettingController::class, 'update'])
            ->name('settings.update');
    });

Route::get('contacts/store', [ContactController::class, 'store'])
    ->name('contacts.store');
