<?php

use Illuminate\Http\Request;

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

Route::post('/payment/process/callback', 'PaymentsController@coingateCallback')->name('payment.coingatecallback');
Route::post('/payment/training/callback', 'TrainingPaymentsController@coingateCallback')->name('training_payment.coingatecallback');
Route::post('/payment/membership/callback', 'MembershipPaymentController@coingateCallback')->name('membership_payment.coingatecallback');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
