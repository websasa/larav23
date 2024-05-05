<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthLoginController;
use App\Http\Controllers\CMSRoleController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CMSUserController;
use App\Http\Controllers\MenuItemController;
use App\Http\Controllers\Auth\AuthRegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




    // Ruta za prikaz obrasca za prijavu
   
    Route::get('/login', [AuthLoginController::class, 'showLoginForm'])->name('login');

// Ruta za prijavu korisnika
Route::post('/login', [AuthLoginController::class, 'login']);
// Ruta za odjavu korisnika
Route::post('/logout', [AuthLoginController::class, 'logout'])->name('logout');
// Ruta za prikaz obrasca za registraciju
Route::get('/register', [AuthRegisterController::class, 'showRegistrationForm'])->name('register');
// Ruta za registraciju korisnika
Route::post('/register', [AuthRegisterController::class, 'register']);
// Ruta za prikaz svih korisnika CMS-a
Route::get('/cms/users', [CMSUserController::class, 'index'])->name('cms.users.index');

// Prikazuje obrazac za stvaranje novog korisnika
Route::get('/cms/users/create', [CMSUserController::class, 'create'])->name('cms.users.create');

// Sprema novog korisnika u bazu podataka
Route::post('/cms/users', [CMSUserController::class, 'store'])->name('cms.users.store');

// Prikazuje detalje korisnika
Route::get('/cms/users/{user}', [CMSUserController::class, 'show'])->name('cms.users.show');

// Prikazuje obrazac za uređivanje korisnika
Route::get('/cms/users/{user}/edit', [CMSUserController::class, 'edit'])->name('cms.users.edit');

// Ažurira podatke korisnika u bazi podataka
Route::put('/cms/users/{user}', [CMSUserController::class, 'update'])->name('cms.users.update');

// Briše korisnika iz baze podataka
Route::delete('/cms/users/{user}', [CMSUserController::class, 'destroy'])->name('cms.users.destroy');
// Prikazuje popis uloga
Route::get('/cms/roles', [CMSRoleController::class, 'index'])->name('cms.roles.index');

// Prikazuje obrazac za stvaranje nove uloge
Route::get('/cms/roles/create', [CMSRoleController::class, 'create'])->name('cms.roles.create');

// Sprema novu ulogu u bazu podataka
Route::post('/cms/roles', [CMSRoleController::class, 'store'])->name('cms.roles.store');

// Prikazuje detalje uloge
Route::get('/cms/roles/{role}', [CMSRoleController::class, 'show'])->name('cms.roles.show');

// Prikazuje obrazac za uređivanje uloge
Route::get('/cms/roles/{role}/edit', [CMSRoleController::class, 'edit'])->name('cms.roles.edit');

// Ažurira podatke uloge u bazi podataka
Route::put('/cms/roles/{role}', [CMSRoleController::class, 'update'])->name('cms.roles.update');

// Briše ulogu iz baze podataka
Route::delete('/cms/roles/{role}', [CMSRoleController::class, 'destroy'])->name('cms.roles.destroy');
// Prikazuje popis stranica
Route::get('/pages', [PageController::class, 'index'])->name('cms.pages.index');

// Prikazuje obrazac za stvaranje nove stranice
Route::get('/pages/create', [PageController::class, 'create'])->name('cms.pages.create');

// Sprema novu stranicu u bazu podataka
Route::post('/pages', [PageController::class, 'store'])->name('cms.pages.store');

// Prikazuje detalje stranice
Route::get('/pages/{page}', [PageController::class, 'show'])->name('cms.pages.show');

// Prikazuje obrazac za uređivanje stranice
Route::get('/pages/{page}/edit', [PageController::class, 'edit'])->name('cms.pages.edit');

// Ažurira podatke stranice u bazi podataka
Route::put('/pages/{page}', [PageController::class, 'update'])->name('cms.pages.update');

// Briše stranicu iz baze podataka
Route::delete('/pages/{page}', [PageController::class, 'destroy'])->name('cms.pages.destroy');
// Prikazuje popis stavki izbornika
Route::get('/menu-items', [MenuItemController::class, 'index'])->name('menu-items.index');

// Prikazuje obrazac za stvaranje nove stavke izbornika
Route::get('/menu-items/create', [MenuItemController::class, 'create'])->name('menu-items.create');

// Sprema novu stavku izbornika u bazu podataka
Route::post('/menu-items', [MenuItemController::class, 'store'])->name('menu-items.store');

// Prikazuje detalje stavke izbornika
Route::get('/menu-items/{menu_item}', [MenuItemController::class, 'show'])->name('menu-items.show');

// Prikazuje obrazac za uređivanje stavke izbornika
Route::get('/menu-items/{menu_item}/edit', [MenuItemController::class, 'edit'])->name('menu-items.edit');

// Ažurira podatke stavke izbornika u bazi podataka
Route::put('/menu-items/{menu_item}', [MenuItemController::class, 'update'])->name('menu-items.update');

// Briše stavku izbornika iz baze podataka
Route::delete('/menu-items/{menu_item}', [MenuItemController::class, 'destroy'])->name('menu-items.destroy');


