<?php

use App\Http\Controllers\PostController;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/about-us', function () {
    $policyFile = Jetstream::localizedMarkdownPath('about.md');

    return view('policy', [
        'policy' => Str::markdown(file_get_contents($policyFile)),
    ]);
})->name('about.show');


Route::resource('blog', PostController::class)->middleware(['auth']);

Route::get('/contact-us', function () {
    return view('contact');
})->name('contact.show');