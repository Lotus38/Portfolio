<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;

Route::get('/', function () {
    return view('index');
});

Route::get('/quiz', [QuizController::class, 'getQuiz']);

Route::post('/check-answer', [QuizController::class, 'checkAnswer'])->name('checkAnswer');

Route::get('/result', [QuizController::class, 'result'])->name('result');
