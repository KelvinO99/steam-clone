<?php
use App\Models\Achievements;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\AchievementsController;

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
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);    
});

Route::controller(GamesController::class)->prefix('games')->group(function($router){
    Route::get('index', 'index');
    Route::get('show/{id}','show');
    Route::delete('destroy/{id}','destroy');
    Route::put('update/{id}','update');
    Route::post('store','store');
    Route::get('featured', 'featured');
});

Route::controller(AchievementsController::class)->prefix('achievements')->group(function($router){
    Route::get('index','index');
    Route::get('show/{id}','show');
    Route::delete('destroy/{id}','destroy');
    Route::put('update/{id}','update');
    Route::post('store','store');
});