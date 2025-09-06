<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\PublicBlogController;
use App\Http\Controllers\PublicProjectController;
use App\Http\Controllers\CommentController; // Add this line
use App\Http\Controllers\LikeController;    // Add this line

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about'); // Add this line

// Public Blog Routes
Route::get('/blogs', [PublicBlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/{blog}', [PublicBlogController::class, 'show'])->name('blogs.show');

// Public Project Routes
Route::get('/projects', [PublicProjectController::class, 'index'])->name('projects.index');

// Public Project Routes
Route::get('/projects', [PublicProjectController::class, 'index'])->name('projects.index');

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');


    Route::get('/project',[DashboardController::class,'project'])->name('dashboard.project');
    Route::get('/project/create',[DashboardController::class,'createProject'])->name('project.create');
    Route::put('/project/{project}/edit',[DashboardController::class,'editProject'])->name('project.edit');
    Route::delete('/project/{project}',[DashboardController::class,'deleteProject'])->name('project.destroy');
    Route::post('/project',[DashboardController::class,'projectStore'])->name('admin.project.store');

    Route::get('/blog',[BlogController::class,'index'])->name('admin.blog.index');
    Route::get('/blog/create',[BlogController::class,'create'])->name('admin.blogs.create');
    Route::post('/blog',[BlogController::class,'store'])->name('admin.blogs.store');
    Route::get('/blog/{blog}/edit',[BlogController::class,'edit'])->name('admin.blogs.edit');
    Route::put('/blog/{blog}',[BlogController::class,'update'])->name('admin.blogs.update');
    Route::delete('/blog/{blog}',[BlogController::class,'destroy'])->name('admin.blogs.destroy');

    // User Management Routes
    Route::prefix('users')->group(function () {
        Route::get('/',[UserController::class,'index'])->name('admin.users.index');
        Route::get('/create',[UserController::class,'create'])->name('admin.users.create');
        Route::post('/',[UserController::class,'store'])->name('admin.users.store');
        Route::get('/{user}/edit',[UserController::class,'edit'])->name('admin.users.edit');
        Route::put('/{user}',[UserController::class,'update'])->name('admin.users.update');
        Route::delete('/{user}',[UserController::class,'destroy'])->name('admin.users.destroy');
    });

    // Settings Routes
    Route::get('/settings',[SettingController::class,'index'])->name('admin.settings.index');
    Route::put('/settings',[SettingController::class,'update'])->name('admin.settings.update');

    // Search Route
    Route::get('/search',[SearchController::class,'index'])->name('admin.search.index');

    
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Comment Routes
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

    // Like Routes
    Route::post('/likes/toggle', [LikeController::class, 'toggle'])->name('likes.toggle');
});

require __DIR__.'/auth.php';
