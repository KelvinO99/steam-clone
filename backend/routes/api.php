<?php
use App\Models\Achievements;
use App\Models\Developers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\AchievementsController;
use App\Http\Controllers\DevelopersController;
use App\Http\Controllers\DevelopersGamesController;
use App\Http\Controllers\FriendshipsController;
use App\Http\Controllers\GamesLanguagesController;
use App\Http\Controllers\GamesTagsController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\LanguagesController;
use App\Http\Controllers\LibrariesController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\SystemCharacteristicsController;
use App\Http\Controllers\SystemRequirementsController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersAchievementController;
use App\Models\Friendships;

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
    Route::get('index','index');
    Route::get('show/{id}','show');
    Route::delete('destroy/{id}','destroy');
    Route::post('update/{id}','update');
    Route::post('store','store');
});

Route::controller(AchievementsController::class)->prefix('achievements')->group(function($router){
    Route::get('index','index');
    Route::get('show/{id}','show');
    Route::delete('destroy/{id}','destroy');
    Route::put('update/{id}','update');
    Route::post('store','store');
});

Route::controller(DevelopersController::class)->prefix('developers')->group(function($router){
    Route::get('index','index');
    Route::get('show/{id}','show');
    Route::delete('destroy/{id}','destroy');
    Route::put('update/{id}','update');
    Route::post('store','store');
});

Route::controller(DevelopersGamesController::class)->prefix('developers_games')->group(function($router){
    Route::get('index','index');
    Route::get('show/{id}','show');
    Route::delete('destroy/{id}','destroy');
    Route::put('update/{id}','update');
    Route::post('store','store');
});

Route::controller(GamesTagsController::class)->prefix('games_tags')->group(function($router){
    Route::get('index','index');
    Route::get('show/{id}','show');
    Route::delete('destroy/{id}','destroy');
    Route::put('update/{id}','update');
    Route::post('store','store');
});

Route::controller(ImagesController::class)->prefix('images')->group(function($router){
    Route::get('index','index');
    Route::get('show/{id}','show');
    Route::delete('destroy/{id}','destroy');
    Route::post('update','update');
    Route::post('store','store');
});

Route::controller(LibrariesController::class)->prefix('libraries')->group(function($router){
    Route::get('index','index');
    Route::get('show/{id}','show');
    Route::delete('destroy/{id}','destroy');
    Route::put('update/{id}','update');
    Route::post('store','store');
});

Route::controller(ReviewsController::class)->prefix('reviews')->group(function($router){
    Route::get('index','index');
    Route::get('show/{id}','show');
    Route::delete('destroy/{id}','destroy');
    Route::put('update/{id}','update');
    Route::post('store','store');
});

Route::controller(TagsController::class)->prefix('tags')->group(function($router){
    Route::get('index','index');
    Route::get('show/{id}','show');
    Route::delete('destroy/{id}','destroy');
    Route::put('update/{id}','update');
    Route::post('store','store');
});

Route::controller(UserController::class)->prefix('users')->group(function($router){
    Route::get('index','index');
    Route::get('show/{id}','show');
    Route::delete('destroy/{id}','destroy');
    Route::put('update','update');
    Route::post('store','store');
});

Route::controller(UsersAchievementController::class)->prefix('users_achievements')->group(function($router){
    Route::get('index','index');
    Route::get('show/{id}','show');
    Route::delete('destroy/{id}','destroy');
    Route::put('update/{id}','update');
    Route::post('store','store');
});

Route::controller(LanguagesController::class)->prefix('languages')->group(function($router){
    Route::get('index','index');
    Route::get('show/{id}','show');
    Route::delete('destroy/{id}','destroy');
    Route::put('update/{id}','update');
    Route::post('store','store');
});

Route::controller(GamesLanguagesController::class)->prefix('games_languages')->group(function($router){
    Route::get('index','index');
    Route::get('show/{id}','show');
    Route::delete('destroy/{id}','destroy');
    Route::put('update/{id}','update');
    Route::post('store','store');
});

Route::controller(SystemCharacteristicsController::class)->prefix('system_characteristics')->group(function($router){
    Route::get('index','index');
    Route::get('show/{id}','show');
    Route::delete('destroy/{id}','destroy');
    Route::put('update/{id}','update');
    Route::post('store','store');
});

Route::controller(SystemRequirementsController::class)->prefix('system_requirements')->group(function($router){
    Route::get('index','index');
    Route::get('show/{id}','show');
    Route::delete('destroy/{id}','destroy');
    Route::put('update/{id}','update');
    Route::post('store','store');
});

Route::controller(FriendshipsController::class)->prefix('friendships')->group(function($router){
    Route::get('index','index');
    Route::get('show/{id}','show');
    Route::delete('destroy/{id}','destroy');
    Route::put('update/{id}','update');
    Route::post('store','store');
});
