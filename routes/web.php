<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Admin\CMSController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\CommentsController;
use App\Http\Controllers\Admin\SystemController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProjectController::class, 'index'])->name('portofolio.index');
Route::get('/project/{slug}', [ProjectController::class, 'show'])->name('portofolio.show');
Route::post('/project/{project}/comment', [ProjectController::class, 'storeComment'])->name('comment.store');
Route::get('/portofolio/about', [AboutController::class, 'index'])->name('portofolio.index');
Route::get('/admin/systemset', [SystemController::class, 'index'])->name('system.index');
Route::get('/admin/comments', [CommentsController::class, 'index'])->name('comments.index');



Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [CMSController::class, 'index'])->name('admin.dashboard');
    Route::post('/dashboard/project', [CMSController::class, 'store'])->name('admin.project.store');
    Route::put('/dashboard/project/{project}', [CMSController::class, 'update'])->name('admin.project.update');
    Route::delete('/dashboard/project/{project}', [CMSController::class, 'destroy'])->name('admin.project.destroy');
});
