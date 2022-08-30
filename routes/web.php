<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\AnnoucementController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', function () {
    if (Auth::guest()) {
        return view('auth.login');
    } else {
        return redirect('/home');
    }
});

Route::get('/home', [HomeController::class, 'index']);

// User Routes
Route::get('/profile', [UserController::class, 'show']);
Route::post('/profile/update', [UserController::class, 'update']);
Route::get('/profile/{user_id}', [UserController::class, 'show']);

Route::get('/course/{class_id}/students', [UserController::class, 'showAll']);

// Class Routes
Route::get('/course/create', [ClassController::class, 'create']);
Route::get('/course/{id}', [ClassController::class, 'show']);

Route::post('/course', [ClassController::class, 'store']);
Route::put('/course/{id}', [ClassController::class, 'update']);
Route::delete('/course/{id}', [ClassController::class, 'destroy']);

Route::post('/course/{class_id}/student', [ClassController::class, 'addStudents']);

// Assignment Routes
Route::post('/course/{id}/assignment', [AssignmentController::class, 'store']);
Route::get('/course/{class_id}/assignment/{assignment_id}', [AssignmentController::class, 'show']);
Route::delete('/course/{class_id}/assignment/{assignment_id}', [AssignmentController::class, 'destroy']);
Route::put('/course/{class_id}/assignment/{assignment_id}', [AssignmentController::class, 'update']);

// Annoucement Routes
Route::post('/course/{course_id}/annoucement', [AnnoucementController::class, 'store']);
Route::get('/course/{course_id}/annoucement/{annoucement_id}', [AnnoucementController::class, 'show']);
Route::delete('/course/{course_id}/annoucement/{annoucement_id}', [AnnoucementController::class, 'destroy']);
Route::put('/course/{course_id}/annoucement/{annoucement_id}', [AnnoucementController::class, 'update']);


// Message Routes
Route::post('/user/{user_id}/message', [MessageController::class, 'store']);
Route::get('/message/{message_id}', [MessageController::class, 'show']);
Route::delete('/message/{message_id}', [MessageController::class, 'destroy']);
Route::get('/message/', [MessageController::class, 'showAll']);

