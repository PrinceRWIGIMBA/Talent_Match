<?php
use App\Http\Middleware\CheckRole;
use App\Http\Middleware\UserMiddleware;
use App\Http\Middleware\RecruiterMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\RecruiterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\JobPostController;
use App\Http\Controllers\Controller;

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
Route::get('/getAll',[AuthController::class, 'getAllUser']);



//protected routes
Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    // Routes that require admin role
    Route::get('/admin',[AdminController::class, 'getAll']);
    Route::post('/admin/store',[AdminController::class, 'createadmin']);
    Route::patch('/admin/update/{admin}',[AdminController::class,'updateAdmin']);
    Route::delete('/admin/delete/{admin}',[AdminController::class,'destroyadmin']);
    Route::post('/admin/logout',[AuthController::class, 'logout']);
    //  Route::resource('/users',UserController::class);
   // Route::resource('/recruiter',RecruiterController::class);
   // Route::resource('/jobPost',JobPostController::class);
});

Route::middleware(['auth:sanctum','recruiter'])->group(function () {
    // Routes that require recruiter role
    Route::get('/recruiter',[RecruiterController::class, 'getAll']);
    Route::post('/recruiter/store',[RecruiterController::class, 'createRecruiter']);
    Route::patch('/recruiter/update/{recruiter}',[RecruiterController::class,'updateRecruiter']);
    Route::delete('/recruiter/delete/{recruiter}',[RecruiterController::class,'destroyRecruiter']);


    Route::get('/job_post',[JobPostController::class, 'getAll']);
    Route::post('/job_post/store',[JobPostController::class, 'createjob_post']);
    Route::patch('/job_post/update/{job_post}',[JobPostController::class,'updatejob_post']);
    Route::delete('/job_post/delete/{job_post}',[JobPostController::class,'destroyjob_post']);



    Route::post('/recruiter/logout',[AuthController::class,'logout']);
     //Route::resource('/recruiter',RecruiterController::class);
   // Route::resource('/jobPost',JobPostController::class);
});


Route::middleware(['auth:sanctum','employee'])->group(function () {
    // Routes that require user role
    Route::get('/employee',[EmployeeController::class, 'getAll']);
    Route::post('/employee/store',[EmployeeController::class, 'createemployee']);
    Route::patch('/employee/update/{employee}',[EmployeeController::class,'updateemployee']);
    Route::delete('/employee/delete/{employee}',[EmployeeController::class,'destroyemployee']);
    Route::post('employee/logout',[AuthController::class, 'logout']);
   // Route::resource('/jobPost',JobPostController::class);
});






// Route::group(['middleware'=>['auth:sanctum']],function(){
    
//    Route::resource('/task',TasksController::class);
   
 
// });