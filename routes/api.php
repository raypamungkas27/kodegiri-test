<?php

use App\Http\Controllers\AdminCT;
use App\Http\Controllers\AuthCT;
use App\Http\Controllers\DocumentApiCT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login/action', [AuthCT::class, 'loginActionApi']);
Route::post('register/action', [AuthCT::class, 'registerActionApi']);

Route::middleware(['jwt.verify'])->group(function () {
    Route::get('admin/my-profile', [AdminCT::class, 'myProfileApi']);
    Route::post('admin/my-profile/action', [AdminCT::class, 'myProfileActionApi']);
    Route::resource('admin/document', DocumentApiCT::class);

    Route::post('admin/document/send-email/{id}', [DocumentApiCT::class, 'send_email_action']);
    Route::get('logout', [AuthCT::class, 'logoutApi']);
});
