<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\InvestorController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;

// ── Public pages ──────────────────────────────────────────────
Route::get('/',           [PublicController::class, 'home'])->name('home');
Route::get('/about',      [PublicController::class, 'about'])->name('about');
Route::get('/what-we-do', [PublicController::class, 'whatWeDo'])->name('what-we-do');
Route::get('/tiers',      [PublicController::class, 'tiers'])->name('tiers');

// ── Registration ──────────────────────────────────────────────
Route::get('/invest',  [RegistrationController::class, 'show'])->name('invest');
Route::post('/invest', [RegistrationController::class, 'store'])->name('invest.store');

// ── Auth ──────────────────────────────────────────────────────
Route::get('/login',   [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login',  [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// ── Investor dashboard ────────────────────────────────────────
Route::middleware(['auth', 'role:investor'])->group(function () {
    Route::get('/dashboard',         [InvestorController::class, 'dashboard'])->name('investor.dashboard');
    Route::get('/dashboard/profile', [InvestorController::class, 'profile'])->name('investor.profile');
});

// ── Admin panel ───────────────────────────────────────────────
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/',                              [AdminController::class, 'index'])->name('index');
    Route::get('/investors',                     [AdminController::class, 'investors'])->name('investors');
    Route::get('/investors/{investor}',          [AdminController::class, 'show'])->name('investors.show');
    Route::patch('/investors/{investor}/status', [AdminController::class, 'updateStatus'])->name('investors.status');
    Route::get('/export/csv',                    [AdminController::class, 'exportCsv'])->name('export.csv');
    Route::get('/export/excel',                  [AdminController::class, 'exportExcel'])->name('export.excel');
    Route::get('/settings',                      [SettingsController::class, 'show'])->name('settings');
    Route::post('/settings',                     [SettingsController::class, 'update'])->name('settings.update');
    Route::get('/settings/test-smtp',            [SettingsController::class, 'testSmtp'])->name('settings.test-smtp');
});
