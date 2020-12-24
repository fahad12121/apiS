<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\Country;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
/*
Route::get('/country', [App\Http\Controllers\CountryController::class, 'country'])->name('country');
Route::get('/country/{id}', [App\Http\Controllers\CountryController::class, 'countrybyid'])->name('countrybyid');
Route::post('/add_country', [App\Http\Controllers\CountryController::class, 'countrysave'])->name('countrysave');
Route::put('/country/{id}', [App\Http\Controllers\CountryController::class, 'countryupdate'])->name('countryupdate');
Route::delete('/country/{country}', [App\Http\Controllers\CountryController::class, 'countrydelete'])->name('countrydelete');
*/
//Resource
//Route::group(['middleware' => 'auth:api'],function(){});

Route::apiResource('/country',Country::class);
