<?php

use App\Http\Controllers\LogoutController;
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

Route::get('/', \App\Livewire\Login::class)->name('login')->middleware('guest');

// Route::middleware(['customer.service'])->group(function () {

   
// });

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', \App\Livewire\Khususon\Index::class)->name('dashboard');
    Route::get('/transactions', \App\Livewire\Transactions::class)->name('transactions');
    Route::get('/members', \App\Livewire\MemberLiveWire::class)->name('members');
    Route::get('/cashbooks', \App\Livewire\Cashbooks::class)->name('cashbooks');
    Route::post('/logout', LogoutController::class)->name('logout');
    Route::get('/account_setting', \App\Livewire\AccountSetting::class)->name('account-setting');
    Route::get('/expenditures', \App\Livewire\Expenditures::class)->name('expenditures');


});

 Route::get('/users',\App\Livewire\ListUser::class)->name('users')->middleware(['super.admin']);

