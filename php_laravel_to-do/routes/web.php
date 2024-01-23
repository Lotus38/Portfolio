<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskCategoryController;
use App\Http\Controllers\TaskController;


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

Route::get('/', function () {return view('index');});

Route::get('/taskcategories', [TaskCategoryController::class, 'showData'])->name('showData');

Route::get('/taskcategory/{category}', [TaskCategoryController::class, 'showTasks'])->name('showTasks');

Route::post('/process-form', [TaskCategoryController::class, 'create'])->name('process.form');

Route::delete('/task-category/{category}', [TaskCategoryController::class, 'delete'])->name('task-category.delete');

Route::delete('/task-delete/{id}', [TaskController::class, 'delete'])->name('task.delete');

Route::post('/add-task', [TaskController::class, 'create'])->name('add.task');

Route::put('/taskcategory-update/{id}', [TaskCategoryController::class, 'update'])->name('task-category.update');

Route::put('/task-update/{id}', [TaskController::class, 'update'])->name('task.update');