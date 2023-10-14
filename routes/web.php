<?php

use App\Http\Controllers\AppsController;
use App\Http\Controllers\LaunchController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProjectsController;
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

Route::get('/', [MainController::class, 'index']);

Route::get('projects', [ProjectsController::class, 'list'])->name('projectsList');
Route::get('projects/create', [ProjectsController::class, 'createForm'])->name('createProjectForm');
Route::post('projects/create', [ProjectsController::class, 'createAction'])->name('createProjectAction');
Route::get('projects/{id}/update', [ProjectsController::class, 'updateForm'])->name('updateProjectForm');
Route::post('projects/{id}/update', [ProjectsController::class, 'updateAction'])->name('updateProjectAction');
Route::get('projects/{id}/delete', [ProjectsController::class, 'deleteForm'])->name('deleteProjectForm');
Route::post('projects/{id}/delete', [ProjectsController::class, 'deleteAction'])->name('deleteProjectAction');

Route::get('apps', [AppsController::class, 'list'])->name('appsList');
Route::get('apps/create', [AppsController::class, 'createForm'])->name('createAppForm');
Route::post('apps/create', [AppsController::class, 'createAction'])->name('createAppAction');
Route::get('apps/{id}/update', [AppsController::class, 'updateForm'])->name('updateAppForm');
Route::post('apps/{id}/update', [AppsController::class, 'updateAction'])->name('updateAppAction');
Route::get('apps/{id}/delete', [AppsController::class, 'deleteForm'])->name('deleteAppForm');
Route::post('apps/{id}/delete', [AppsController::class, 'deleteAction'])->name('deleteAppAction');

Route::get('apps/{id}/build', [LaunchController::class, 'launchBuildForm'])->name('launchBuildForm');
Route::post('apps/{id}/build', [LaunchController::class, 'launchBuildAction'])->name('launchBuildAction');
