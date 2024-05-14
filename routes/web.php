<?php

use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RequestedJobController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(FeedbackController::class)->group(function(){
    Route::get('/feedback',"index")->name("feedback.index");
    Route::get('/feedback/create',"create")->name("feedback.create");
    Route::post('/feedback',"store")->name("feedback.store");
});

Route::controller(RequestedJobController::class)->group(function(){
    Route::get('/jobs',"index")->name("jobs.index");
    Route::get('/jobs/create/{service}',"create")->name("jobs.create");
    Route::post('/jobs',"store")->name("jobs.store");
});

Route::controller(ServiceController::class)->group(function(){
    Route::get('/services',"index")->name("services.index");
    Route::get('/services/create',"create")->name("services.create");
    Route::post('/services',"store")->name("services.store");
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
