<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HandbookController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminAuthMiddleware;

// Main Handbook Route
Route::get('/', [HandbookController::class, 'index'])->name('handbook.index');

// Public Data API Endpoints for Dynamic MDC Synchronization
Route::prefix('api')->name('api.')->group(function () {
    Route::get('/penal-codes', [HandbookController::class, 'getPenalCodes'])->name('penal_codes');
    Route::get('/officers', [HandbookController::class, 'getOfficers'])->name('officers');
    Route::get('/rules', [HandbookController::class, 'getRules'])->name('rules');
    Route::get('/weapon-classes', [HandbookController::class, 'getWeaponClasses'])->name('weapon_classes');
    Route::get('/radio-codes', [HandbookController::class, 'getRadioCodes'])->name('radio_codes');
    Route::get('/tactical', [HandbookController::class, 'getTacticals'])->name('tactical');
    Route::get('/incidents', [HandbookController::class, 'getIncidents'])->name('incidents');
    Route::get('/legals', [HandbookController::class, 'getLegals'])->name('legals');
    Route::get('/promotions', [HandbookController::class, 'getPromotions'])->name('promotions');
});

// Admin Authentication Routes
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'authenticate'])->name('admin.authenticate');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// Protected Admin Panel Routes (Covering All 13 Handbook Sidebar Tabs)
Route::middleware([AdminAuthMiddleware::class])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');

    // 1. Penal Codes & Calculator CRUD
    Route::get('/penal-codes', [AdminController::class, 'penalCodes'])->name('penal_codes');
    Route::post('/penal-codes', [AdminController::class, 'storePenalCode'])->name('penal_codes.store');
    Route::post('/penal-codes/category', [AdminController::class, 'storeCategoryCard'])->name('penal_codes.store_category');
    Route::put('/penal-codes/{id}', [AdminController::class, 'updatePenalCode'])->name('penal_codes.update');
    Route::delete('/penal-codes/{id}', [AdminController::class, 'destroyPenalCode'])->name('penal_codes.destroy');

    // 2. Personnel / Chain of Command Roster CRUD
    Route::get('/officers', [AdminController::class, 'officers'])->name('officers');
    Route::post('/officers', [AdminController::class, 'storeOfficer'])->name('officers.store');
    Route::put('/officers/{id}', [AdminController::class, 'updateOfficer'])->name('officers.update');
    Route::delete('/officers/{id}', [AdminController::class, 'destroyOfficer'])->name('officers.destroy');

    // 3. Prosedur Taktis CRUD
    Route::get('/tactical', [AdminController::class, 'tactical'])->name('tactical');
    Route::post('/tactical', [AdminController::class, 'storeTactical'])->name('tactical.store');
    Route::put('/tactical/{id}', [AdminController::class, 'updateTactical'])->name('tactical.update');
    Route::delete('/tactical/{id}', [AdminController::class, 'destroyTactical'])->name('tactical.destroy');

    // 4. Operational Rules CRUD
    Route::get('/rules', [AdminController::class, 'rules'])->name('rules');
    Route::post('/rules', [AdminController::class, 'storeRule'])->name('rules.store');
    Route::put('/rules/{id}', [AdminController::class, 'updateRule'])->name('rules.update');
    Route::delete('/rules/{id}', [AdminController::class, 'destroyRule'])->name('rules.destroy');

    // 5. Weapon Classes CRUD
    Route::get('/weapons', [AdminController::class, 'weapons'])->name('weapons');
    Route::post('/weapons', [AdminController::class, 'storeWeapon'])->name('weapons.store');
    Route::put('/weapons/{id}', [AdminController::class, 'updateWeapon'])->name('weapons.update');
    Route::delete('/weapons/{id}', [AdminController::class, 'destroyWeapon'])->name('weapons.destroy');

    // 6. Incident Command Structure CRUD
    Route::get('/incidents', [AdminController::class, 'incidentCommands'])->name('incidents');
    Route::post('/incidents', [AdminController::class, 'storeIncidentCommand'])->name('incidents.store');
    Route::put('/incidents/{id}', [AdminController::class, 'updateIncidentCommand'])->name('incidents.update');
    Route::delete('/incidents/{id}', [AdminController::class, 'destroyIncidentCommand'])->name('incidents.destroy');

    // 7. Proses Hukum & Court Verdict CRUD
    Route::get('/legals', [AdminController::class, 'legalProcedures'])->name('legals');
    Route::post('/legals', [AdminController::class, 'storeLegalProcedure'])->name('legals.store');
    Route::put('/legals/{id}', [AdminController::class, 'updateLegalProcedure'])->name('legals.update');
    Route::delete('/legals/{id}', [AdminController::class, 'destroyLegalProcedure'])->name('legals.destroy');

    // 8. Kualifikasi Promosi CRUD
    Route::get('/promotions', [AdminController::class, 'promotions'])->name('promotions');
    Route::post('/promotions', [AdminController::class, 'storePromotion'])->name('promotions.store');
    Route::put('/promotions/{id}', [AdminController::class, 'updatePromotion'])->name('promotions.update');
    Route::delete('/promotions/{id}', [AdminController::class, 'destroyPromotion'])->name('promotions.destroy');

    // 9. Patrol Reports Management
    Route::get('/reports', [AdminController::class, 'reports'])->name('reports');
    Route::delete('/reports/{id}', [AdminController::class, 'destroyReport'])->name('reports.destroy');
});
