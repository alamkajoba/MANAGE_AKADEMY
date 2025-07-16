<?php

use App\Livewire\Module\Fees\FeesCreate;
use App\Livewire\Module\Fees\FeesUpdate;
use App\Livewire\Module\Fees\FeesIndex;
use App\Livewire\Module\Payment\PaymentCreate;
use App\Livewire\Module\Recovery\RecoveryCreate;
use App\Livewire\Module\Recovery\RecoveryPrint;
use App\Livewire\Module\Registration\RegistrationCreate;
use App\Livewire\Module\Registration\RegistrationIndex;
use App\Livewire\Module\Registration\RegistrationUpdate;
use App\Livewire\Module\ReRegistration\ReRegistrationCreate;
use App\Livewire\Module\ReRegistration\ReRegistrationIndex;
use App\Livewire\Module\ReRegistration\ReRegistrationUpdate;
use App\Livewire\Module\User\UserCreate;
use App\Livewire\Module\User\UserIndex;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

#Registration route
Route::prefix('registration')->name('registration.')->group(function () {
    Route::get('index', RegistrationIndex::class)->name('index');
    Route::get('create', RegistrationCreate::class)->name('create');
    Route::get('update', RegistrationUpdate::class)->name('update');
});

#Re-registration route
Route::prefix('registration')->name('reregistration.')->group(function () {
    Route::get('reregistrationindex', ReRegistrationIndex::class)->name('index');
    Route::get('reregistrationcreate', ReRegistrationCreate::class)->name('create');
    Route::get('/{id}/reregistrationupdate', ReRegistrationUpdate::class)->name('update');
});

#Payment route
Route::prefix('payment')->name('payment.')->group(function () {
    Route::get('paymentindex', PaymentCreate::class)->name('create');
});

#Fees route
Route::prefix('fees')->name('fees.')->group(function () {
    Route::get('feescreate', FeesCreate::class)->name('create');
    Route::get('feesupdate/{id}', FeesUpdate::class)->name('update');
    Route::get('feesindex', FeesIndex::class)->name('index');
    
});

#Recovery route
Route::prefix('recovery')->name('recovery.')->group(function () {
    Route::get('recoverycreate', RecoveryCreate::class)->name('create');
    Route::get('recoveryprint', RecoveryPrint::class)->name('print');
});


#User route
Route::prefix('user')->name('user.')->group(function () {
    Route::get('usercreate', UserCreate::class)->name('create');
    Route::get('userindex', UserIndex::class)->name('index');
});

require __DIR__.'/auth.php';
