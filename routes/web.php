<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\MinistryController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckLogged;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookTypeController;
use App\Http\Controllers\BookSubController;
use App\Http\Controllers\UpdateBookSub;
use App\Http\Controllers\ErrorQuantity;
use App\Http\Controllers\SubjectInfoController;
use App\Http\Middleware\CheckLogin;

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


Route::middleware([CheckLogged::class])->group(function () {
    // Authenticate
    Route::get('/', [AuthenticateController::class, 'login'])->name('login');
    Route::post('/login-process', [AuthenticateController::class, 'loginProcess'])->name('login-process');
});

Route::get('/logout', [AuthenticateController::class, 'logout'])->name('logout');

//giáo vụ
Route::resource('ministry', MinistryController::class);
//ngành
Route::resource('major', MajorController::class);
//Khóa
Route::resource('course', CourseController::class);
//Môn học
Route::resource('subject', SubjectController::class);
//Lớp
Route::resource('classes', ClassesController::class);
//Profile
Route::resource('profile', ProfileController::class);
//Student
Route::resource('student', StudentController::class);
//Book
Route::resource('book', BookController::class);
//Booktype
Route::resource('booktype', BookTypeController::class);
//testing git
Route::resource('dashboard', DashboardController::class);
Route::resource('booksub', BookSubController::class);


Route::get('errorQuantity', [ErrorQuantity::class, 'showError'])->name("errorQuantity");
Route::get('updatebooksub', [UpdateBookSub::class, 'updateStatus'])->name("updateStatusBookSub");
Route::get('CreateSubjectMajor', [SubjectInfoController::class, 'CreateSubjectMajor'])->name('CreateSubjectMajor');
Route::get('StoreSubjectMajor', [SubjectInfoController::class, 'StoreSubjectMajor'])->name('StoreSubjectMajor');
