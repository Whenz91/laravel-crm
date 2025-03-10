<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect('/', '/login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth:sanctum', 'verified'])->name('dashboard');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('clients', ClientController::class)->names([
        'index' => 'client',
        'show' => 'client.show',
        'create' => 'client.create',
        'store' =>  'client.store',
        'edit' => 'client.edit',
        'update' => 'client.update',
        'destroy' => 'client.destroy'
    ]);
    Route::resource('projects', ProjectController::class)->names([
        'index' => 'project',
        'show' => 'project.show',
        'create' => 'project.create',
        'store' =>  'project.store',
        'edit' => 'project.edit',
        'update' => 'project.update',
        'destroy' => 'project.destroy'
    ]);
    Route::resource('tasks', TaskController::class)->names([
        'index' => 'task',
        'show' => 'task.show',
        'create' => 'task.create',
        'store' =>  'task.store',
        'edit' => 'task.edit',
        'update' => 'task.update',
        'destroy' => 'task.destroy'
    ]);
});

require __DIR__.'/auth.php';
