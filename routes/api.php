<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\DressbarnPlatformsController;
use App\Http\Controllers\API\FarmersCartPlatformsController;
use App\Http\Controllers\API\FranklinMintPlatformsController;
use App\Http\Controllers\API\LinensNThingsPlatformsController;
use App\Http\Controllers\API\ModellsPlatformsController;
use App\Http\Controllers\API\Pier1PlatformsController;
use App\Http\Controllers\API\RadioShackPlatformsController;
use App\Http\Controllers\API\SteinMartPlatformsController;


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

Route::apiResource('user', UserController::class);
//Route::apiResource('platform', PlatformController::class);
Route::apiResource('post', PostController::class);

//Dressbarn Platforms
Route::post('platform/dressbarn/{id}', [DressbarnPlatformsController::class, 'store'])->name('dressbarnplatform.store');
Route::get('platform/dressbarn/{id}', [DressbarnPlatformsController::class, 'show'])->name('dressbarnplatform.show');
Route::put('platform/dressbarn/{id}', [DressbarnPlatformsController::class, 'update'])->name('dressbarnplatform.update');

//FarmersCart Platforms
Route::post('platform/farmerscart/{id}', [FarmersCartPlatformsController::class, 'store'])->name('farmerscartplatform.store');
Route::get('platform/farmerscart/{id}', [FarmersCartPlatformsController::class, 'show'])->name('farmerscartplatform.show');
Route::put('platform/farmerscart/{id}', [FarmersCartPlatformsController::class, 'update'])->name('farmerscartplatform.update');

//FranklinMint Platforms
Route::post('platform/franklinmint/{id}', [FranklinMintPlatformsController::class, 'store'])->name('franklinmintplatform.store');
Route::get('platform/franklinmint/{id}', [FranklinMintPlatformsController::class, 'show'])->name('franklinmintplatform.show');
Route::put('platform/franklinmint/{id}', [FranklinMintPlatformsController::class, 'update'])->name('franklinmintplatform.update');

//LinensNThings Platforms
Route::post('platform/linensnthings/{id}', [LinensNThingsPlatformsController::class, 'store'])->name('linensnthingsplatform.store');
Route::get('platform/linensnthings/{id}', [LinensNThingsPlatformsController::class, 'show'])->name('linensnthingsplatform.show');
Route::put('platform/linensnthings/{id}', [LinensNThingsPlatformsController::class, 'update'])->name('linensnthingsplatform.update');

//Modells Platforms
Route::post('platform/modells/{id}', [ModellsPlatformsController::class, 'store'])->name('modellsplatform.store');
Route::get('platform/modells/{id}', [ModellsPlatformsController::class, 'show'])->name('modellsplatform.show');
Route::put('platform/modells/{id}', [ModellsPlatformsController::class, 'update'])->name('modellsplatform.update');

//Pier1 Platforms
Route::post('platform/pier1/{id}', [Pier1PlatformsController::class, 'store'])->name('pier1platform.store');
Route::get('platform/pier1/{id}', [Pier1PlatformsController::class, 'show'])->name('pier1platform.show');
Route::put('platform/pier1/{id}', [Pier1PlatformsController::class, 'update'])->name('pier1platform.update');

//RadioShack Platforms
Route::post('platform/radioshack/{id}', [RadioShackPlatformsController::class, 'store'])->name('radioshackplatform.store');
Route::get('platform/radioshack/{id}', [RadioShackPlatformsController::class, 'show'])->name('radioshackplatform.show');
Route::put('platform/radioshack/{id}', [RadioShackPlatformsController::class, 'update'])->name('radioshackplatform.update');

//Steinmart Platforms
Route::post('platform/steinmart/{id}', [SteinmartPlatformsController::class, 'store'])->name('steinmartplatform.store');
Route::get('platform/steinmart/{id}', [SteinmartPlatformsController::class, 'show'])->name('steinmartplatform.show');
Route::put('platform/steinmart/{id}', [SteinmartPlatformsController::class, 'update'])->name('steinmartplatform.update');

