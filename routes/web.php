<?php

use App\Http\Controllers\AdminCT;
use App\Http\Controllers\AuthCT;
use App\Http\Controllers\DocumentsCT;
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

Route::get('/', [AuthCT::class, 'login']);
Route::post('/login/action', [AuthCT::class, 'loginAction']);
Route::get('register', [AuthCT::class, 'register']);
Route::post('register/action', [AuthCT::class, 'registerAction']);


Route::get('logout', [AuthCT::class, 'logout']);
Route::group(['middleware' => 'AuthMD', 'prefix' => 'admin'], function () {
    Route::get('dashboard', [AdminCT::class, 'dashboard']);
    Route::get('my-profile', [AdminCT::class, 'myProfile']);
    Route::post('my-profile/action', [AdminCT::class, 'myProfileAction']);
    Route::resource('document', DocumentsCT::class);
    Route::get('document/delete/{id}', [DocumentsCT::class, 'delete']);
    Route::get('document/send-email/{id}', [DocumentsCT::class, 'send_email']);
    Route::post('document/send-email/action/{id}', [DocumentsCT::class, 'send_email_action']);
});
