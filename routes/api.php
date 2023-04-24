<?php
use App\Http\Middleware\CheckRole;
use App\Http\Middleware\UserMiddleware;
use App\Http\Middleware\RecruiterMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RectruiterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\JobPostController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::group(['middleware' => ['auth', 'role:admin']], function () {
//     // Routes that require admin role
// });

// Route::group(['middleware' => ['auth', 'role:manager|admin']], function () {
//     // Routes that require manager or admin role
// });






Route::post('/login',[AuthController::class, 'login']);
Route::post('/register',[AuthController::class, 'register']);



//protected routes
Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    // Routes that require admin role
    Route::resource('/admin',AdminController::class);
    Route::post('/logout',[AuthController::class, 'logout']);
    //  Route::resource('/users',UserController::class);
   // Route::resource('/recruiter',RecruiterController::class);
   // Route::resource('/jobPost',JobPostController::class);
});

Route::middleware(['auth:sanctum', 'recruiter'])->group(function () {
    // Routes that require recruiter role
   Route::resource('/recruiter',RectruiterController::class);
   Route::post('/logout',[AuthController::class, 'logout']);
   // Route::resource('/jobPost',JobPostController::class);
});


Route::middleware(['auth:sanctum', 'user'])->group(function () {
    // Routes that require user role
    Route::resource('/users',UserController::class);
    Route::post('/logout',[AuthController::class, 'logout']);
   // Route::resource('/jobPost',JobPostController::class);
});






// Route::group(['middleware'=>['auth:sanctum']],function(){
    
//    Route::resource('/task',TasksController::class);
   
 
// });