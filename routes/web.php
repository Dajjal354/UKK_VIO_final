<?php

use App\Http\Controllers\TracerKuliahController;
use App\Http\Controllers\TracerKerjaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\AlumniRegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserActivityController;
use App\Http\Controllers\Admin\BidangKeahlianController;
use App\Http\Controllers\Admin\ProgramKeahlianController;
use App\Http\Controllers\Admin\KonsentrasiKeahlianController;
use App\Http\Controllers\Admin\TahunLulusController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\AlumniViewController;
use App\Http\Controllers\Admin\SekolahController;
use App\Http\Controllers\SekolahController as UserSekolahController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Default route redirects to login
Route::get('/', [HomeController::class, 'index'])->name('home');

// Authentication Routes with Email Verification
Auth::routes(['verify' => true]);

// Email Verification Routes
Route::group(['middleware' => ['auth']], function() {
    Route::get('/email/verify', function () { 
        return view('auth.verify');
    })->name('verification.notice');

    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    })->name('verification.send');

    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect('/home');
    })->middleware(['signed'])->name('verification.verify');
});

// User Routes
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::prefix('alumni')->group(function () {
        Route::get('/register', [AlumniRegisterController::class, 'showRegistrationForm'])->name('alumni.register');
        Route::post('/register', [AlumniRegisterController::class, 'register'])->name('alumni.store');

        Route::get('/tracer/kuliah/{alumni}', [TracerKuliahController::class, 'create'])->name('tracer.kuliah.form');
        Route::post('/tracer/kuliah/{alumni}', [TracerKuliahController::class, 'store'])->name('tracer.kuliah.store');
        
        Route::get('/tracer/kerja/{alumni}', [TracerKerjaController::class, 'create'])->name('tracer.kerja.form');
        Route::post('/tracer/kerja/{alumni}', [TracerKerjaController::class, 'store'])->name('tracer.kerja.store');

        Route::get('{alumni}/testimonial/create', [TestimonialController::class, 'create'])->name('testimonial.create');
        Route::post('{alumni}/testimonial', [TestimonialController::class, 'store'])->name('testimonial.store');
    });

    Route::prefix('profile')->group(function () {
        Route::get('/', [UserController::class, 'profileUser'])->name('profileUser.edit');
        Route::patch('/', [UserProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [UserProfileController::class, 'destroy'])->name('profile.destroy');
        Route::post('/', [UserProfileController::class, 'store'])->name('user.profile.store');
    });

    Route::get('/sekolah', [UserSekolahController::class, 'show'])->name('sekolah.show');

    // Update Password user
    Route::put('/profile/password', [App\Http\Controllers\Auth\UserPasswordController::class, 'update'])
    ->name('password.update');
});

// Admin Routes
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [AdminController::class, 'adminDashboard'])->name('admin.home');
    Route::prefix('admin/profile')->group(function () {
        Route::get('/', [AdminController::class, 'profileAdmin'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('admin.profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('admin.profile.destroy');
        Route::post('/', [ProfileController::class, 'store'])->name('admin.profile.store');
        
    });
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('bidang-keahlian', BidangKeahlianController::class);
        Route::resource('program-keahlian', ProgramKeahlianController::class);
        Route::resource('konsentrasi-keahlian', KonsentrasiKeahlianController::class);
        Route::resource('tahun-lulus', TahunLulusController::class);
    });
    Route::get('/api/user-activity', [UserActivityController::class, 'getActivityData']);
    Route::get('/admin/alumni', [AlumniViewController::class, 'index'])->name('alumni.index');
    Route::get('/admin/alumni/{alumni}', [AlumniViewController::class, 'show'])->name('alumni.show');
    Route::delete('/alumni/{alumni}', [AlumniViewController::class, 'destroy'])->name('alumni.destroy');
    Route::get('/admin/sekolah', [SekolahController::class, 'index'])->name('admin.sekolah.index');
    Route::post('/admin/sekolah', [SekolahController::class, 'store'])->name('admin.sekolah.store');

    // Update Password admin
    Route::put('admin/password', [App\Http\Controllers\Auth\AdminPasswordController::class, 'update'])
        ->name('admin.password.update');
});

Route::get('/home', [TestimonialController::class, 'getTestimonials'])->name('home');

require __DIR__.'/auth.php';