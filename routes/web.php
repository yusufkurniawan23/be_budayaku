<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BudayaController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SenimanController;
use App\Http\Controllers\SenimanPublicController;
use Illuminate\Support\Facades\Auth;
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

//ROUTE FRONTEND HOMEPAGE
// Route::get('/', [HomeController::class, 'index'])->name('homepage');
Route::get('/', function () {
    return view('layouts.homepage'); // Pastikan view 'homepage.blade.php' ada di folder resources/views
})->name('layouts.homepage');

Route::get('seniman', [SenimanPublicController::class, 'index'])->name('seniman');
Route::get('/seniman/{id}', [SenimanPublicController::class, 'show'])->name('profile.seniman.show');
Route::get('budaya', [BudayaController::class, 'budaya'])->name('budaya');
Route::get('contact', [HomeController::class, 'contact'])->name('contact');


// ==========================
// ROUTE PROFILE
// ==========================

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/post/create', [ProfileController::class, 'createPost'])->name('post.create');
    Route::post('/post/store', [ProfileController::class, 'storePost'])->name('post.store');
});

// ==========================
// ROUTE LOGIN, LOGOUTE, REGISTER
// ==========================

// ROUTE LOGIN
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// ROUTE LOGOUT
// Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect()->route('layouts.homepage'); // Redirect ke dashboard home
})->name('logout');

//ROUTE REGISTER
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);


// ==========================
// ROUTE FITUR SENIMAN
// ==========================

// Rute untuk User Profile dan Posting Seniman
Route::middleware('auth')->prefix('profile')->name('profile.')->group(function () {
    Route::get('/', [ProfileController::class, 'index'])->name('index');
    Route::get('/edit', [ProfileController::class, 'editProfile'])->name('edit'); // Untuk edit profil user
    Route::put('/', [ProfileController::class, 'updateProfile'])->name('update'); // Untuk update profil user

    // Rute untuk postingan seniman oleh user
    Route::get('/seniman/create', [ProfileController::class, 'createSenimanPost'])->name('seniman.create');
    Route::post('/seniman', [ProfileController::class, 'storeSenimanPost'])->name('seniman.store');
    Route::get('/seniman/{id}/edit', [ProfileController::class, 'editSenimanPost'])->name('seniman.edit');
    Route::put('/seniman/{id}', [ProfileController::class, 'updateSenimanPost'])->name('seniman.update');
    Route::delete('/seniman/{id}', [ProfileController::class, 'deleteSenimanPost'])->name('seniman.delete');
});


// ==========================
// ROUTE AGENDA
// ==========================


// FRONTEND AGENDA
Route::get('/agenda', [AgendaController::class, 'showFrontend'])->name('agenda');
Route::get('/agenda/{id}', [AgendaController::class, 'detail'])->name('frontend.agenda_detail');


// ==========================
// ROUTE BUDAYA
// ==========================


// Route untuk fitur Budaya (frontend)
Route::get('/cagar-budaya', [BudayaController::class, 'cagarBudaya'])->name('cagar.budaya');
Route::get('/cagar-alam', [BudayaController::class, 'cagarAlam'])->name('cagar.alam');
Route::get('/budaya/{id}', [BudayaController::class, 'show'])->name('budaya.show');


// ==========================
// ROUTE AGENDA
// ==========================

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');


// ==========================
// Admin Routes (with prefix)
// ==========================
Route::prefix('admin')->group(function () {

    // Dashboard Admin
    Route::get('/dashboard/admin', function () {
        return view('layouts.app'); // Pastikan view-nya 'resources/views/admin/dashboard.blade.php'
    })->name('layouts.app');

        // Route untuk Dashboard Admin
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Seniman
    Route::get('/seniman', [SenimanController::class, 'index'])->name('admin.seniman.index');
    Route::get('/seniman/create', [SenimanController::class, 'create'])->name('admin.seniman.create');
    Route::post('/seniman/store', [SenimanController::class, 'store'])->name('admin.seniman.store');
    Route::get('/seniman/{id}/edit', [SenimanController::class, 'edit'])->name('admin.seniman.edit');
    Route::put('/seniman/{id}/update', [SenimanController::class, 'update'])->name('admin.seniman.update');
    Route::delete('/seniman/{id}/delete', [SenimanController::class, 'destroy'])->name('admin.seniman.delete');

    // Budaya
    Route::get('/budaya', [BudayaController::class, 'index'])->name('admin.budaya.index');
    Route::get('/budaya/create', [BudayaController::class, 'create'])->name('admin.budaya.create');
    Route::post('/budaya/store', [BudayaController::class, 'store'])->name('admin.budaya.store');
    Route::get('/budaya/{id}/edit', [BudayaController::class, 'edit'])->name('admin.budaya.edit');
    Route::put('/budaya/{id}/update', [BudayaController::class, 'update'])->name('admin.budaya.update');
    Route::get('/budaya/{id}/delete', [BudayaController::class, 'destroy'])->name('admin.budaya.destroy');

    // Agenda
    Route::get('/agenda', [AgendaController::class, 'index'])->name('admin.agenda.index');
    Route::get('/agenda/create', [AgendaController::class, 'create'])->name('admin.agenda.create');
    Route::post('/agenda/store', [AgendaController::class, 'store'])->name('admin.agenda.store');
    Route::get('/agenda/{id}/edit', [AgendaController::class, 'edit'])->name('admin.agenda.edit');
    Route::post('/agenda/{id}/update', [AgendaController::class, 'update'])->name('admin.agenda.update');
    Route::delete('/agenda/{id}/delete', [AgendaController::class, 'destroy'])->name('admin.agenda.delete');

    //Contact
    Route::get('/contacts', [ContactController::class, 'index'])->name('admin.contacts.index');
});
