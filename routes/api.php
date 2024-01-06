<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Api\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function() {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('logout', [AuthController::class, 'logout']);
});

Route::get('users', [UsersController::class, 'users']);
Route::post('signup', [AuthController::class, 'signup']);

// Test API
Route::post('foods', [UsersController::class, 'store']);

// ภาระหนี้สินเชื่อ
Route::get('loan_debts', [UsersController::class, 'loan_debts']);
// get_code
Route::get('get_code', [UsersController::class, 'get_code']);

// Test รหัสลูกค้า
Route::get('customer_code', [UsersController::class, 'customer_code']);

// get_detail_user
Route::get('get_detail_user', [UsersController::class, 'get_detail_user']);

// update_loan_debts
Route::post('update_loan_debts', [UsersController::class, 'update_loan_debts']);
Route::post('update_loan_debts/{id}', [UsersController::class, 'update_loan_debts']);
Route::get('edit_loan_debts/{id}', [UsersController::class, 'edit_loan_debts']);

Route::post('login', [AuthController::class, 'login']);
