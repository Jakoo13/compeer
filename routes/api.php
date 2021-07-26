<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\DressbarnPlatformsController;


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



Route::get('profile', [UserController::class, 'profile'])->name('user.profile');
Route::put('profile/{id}', [UserController::class, 'uploadPhoto'])->name('user.uploadPhoto');

Route::post('platform/dressbarn/{id}', [DressbarnPlatformsController::class, 'store'])->name('dressbarnplatform.store');
Route::get('platform/dressbarn/{id}', [DressbarnPlatformsController::class, 'show'])->name('dressbarnplatform.show');
Route::put('platform/dressbarn/{id}', [DressbarnPlatformsController::class, 'update'])->name('dressbarnplatform.update');

Route::apiResource('user', UserController::class);
//Route::apiResource('platform', PlatformController::class);
Route::apiResource('post', PostController::class);

