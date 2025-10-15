<?php

use App\Livewire\Module\Permissions\AssignPermission;
use App\Livewire\Module\AcademicYear\AcademicYearIndex;
use App\Livewire\Module\Classes\Classes;
use App\Livewire\Module\Faculty\Faculty;
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
use App\Livewire\Module\User\UserCreate;
use App\Livewire\Module\User\UserIndex;
use App\Livewire\Module\User\UserUpdate;
use App\Livewire\Module\Finance\FinanceCreate;
use App\Livewire\Module\Finance\FinanceIndex;
use App\Livewire\Module\Finance\FinanceUpdate;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

#Registration route
Route::middleware('auth')->prefix('registration')->name('registration.')->group(function () {
    Route::get('index', RegistrationIndex::class)->name('index');
    Route::get('create', RegistrationCreate::class)->name('create');
    Route::get('reregistrationupdate/{id}', RegistrationUpdate::class)->name('update');
});

#classes Faculty Academic route
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('faculty', Faculty::class)->name('faculty');
    Route::get('academic', AcademicYearIndex::class)->name('academic');
    Route::get('classes', Classes::class)->name('classes');
});

#Re-registration route
Route::middleware('auth')->prefix('registration')->name('reregistration.')->group(function () {
    Route::get('reregistrationcreate', ReRegistrationCreate::class)->name('create');
});

#Payment route
Route::middleware('auth')->prefix('payment')->name('payment.')->group(function () {
    Route::get('paymentindex', PaymentCreate::class)->name('create');
});

#Fees route
Route::middleware('auth')->prefix('fees')->name('fees.')->group(function () {
    Route::get('feescreate', FeesCreate::class)->name('create');
    Route::get('feesupdate/{id}', FeesUpdate::class)->name('update');
    Route::get('feesindex', FeesIndex::class)->name('index');
    
});

#Recovery route
Route::middleware('auth')->prefix('recovery')->name('recovery.')->group(function () {
    Route::get('recoverycreate', RecoveryCreate::class)->name('create');
    Route::get('recoveryprint', RecoveryPrint::class)->name('print');
});


#User route
Route::middleware('auth')->prefix('user')->name('user.')->group(function () {
    Route::get('usercreate', UserCreate::class)->name('create');
    Route::get('userindex', UserIndex::class)->name('index');
    Route::get('userupdate/{id}', UserUpdate::class)->name('userupdate');
});

#Finance route
Route::middleware('auth')->prefix('finance')->name('finance.')->group(function () {
    Route::get('financecreate', FinanceCreate::class)->name('create');
    Route::get('financeindex', FinanceIndex::class)->name('index');
    Route::get('financeupdate/{id}', FinanceUpdate::class)->name('financeupdate');
});


//Test error
Route::get('/error', function(){
    abort(419);
});

require __DIR__.'/auth.php';
