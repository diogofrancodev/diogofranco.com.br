<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Site\StoreController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CheckoutController;

use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\Site\DevPingController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\CategoryPostController;
use App\Http\Controllers\Admin\DevPingController as AdminDevPingController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\UsersController;





Route::get('/', [SiteController::class, 'index'])->name('site.index');
Route::get('/posts', [SiteController::class, 'postAll'])->name('site.posts');
Route::get('/posts/categoria/{id}', [SiteController::class, 'postCategory'])->name('site.posts.category');
Route::get('/post/{id}', [SiteController::class, 'post'])->name('site.post');
Route::get('/devpings', [DevPingController::class, 'index'])->name('dev.pings');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::group(['middleware' => ['auth'],'prefix' => 'admin'],function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::resource('/post_categorias', CategoryPostController::class);

    Route::resource('/posts', PostController::class);
    Route::resource('/devpings', AdminDevPingController::class);


    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('permissions', PermissionsController::class);
    Route::delete('permissions_mass_destroy', [PermissionsController::class], 'massDestroy')->name('permissions.mass_destroy');
    Route::resource('roles', RolesController::class);
    Route::delete('roles_mass_destroy', [RolesController::class, 'massDestroy'])->name('roles.mass_destroy');
    Route::resource('users', UsersController::class );
    Route::delete('users_mass_destroy', [UsersController::class, 'massDestroy'])->name('users.mass_destroy');
});



Route::get('/register', function () {
    // Only authenticated users may access this route...
})->middleware('auth');



Route::get('/offline', function () {
    return view('offline');
});
