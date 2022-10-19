<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\ChapterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix'  =>  'admin'], function () {

    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [LoginController::class, 'login'])->name('admin.login.post');
    Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');

    Route::group(['middleware' => ['auth:admin']], function () {

        Route::get('/', function () {
            return view('admin.dashboard.index');
        })->name('admin.dashboard');

        Route::get('dashboard', [DashboardController::class, 'index'])->name('admin-dashboard');


        Route::prefix('courses/')->group(function () {
            Route::get('/', [CourseController::class, 'index'])->name('view-courses');
            Route::get('/addCourse', [CourseController::class, 'addCourse'])->name('add-course');
            Route::post('/store', [CourseController::class, 'store'])->name('store-course');
            Route::get('/edit/{id}', [CourseController::class, 'editCourse'])->name('edit-course');
            Route::post('/update', [CourseController::class, 'updateCourse'])->name('update-course');
            Route::get('/deleteCourse/{id}', [CourseController::class, 'deleteCourse'])->name('delete-course');
        });
        Route::prefix('chapters/')->group(function () {
            Route::get('/', [ChapterController::class, 'index'])->name('view-chapters');
            Route::get('/addChapter', [ChapterController::class, 'addChapter'])->name('add-chapter');
            Route::post('/storeChapter', [ChapterController::class, 'store'])->name('store-chapter');
            Route::get('/deleteChapter/{id}', [ChapterController::class, 'deleteChapter'])->name('delete-chapter');

        });

        Route::prefix('lessons/')->group(function () {
            Route::get('/', [LessonController::class, 'index'])->name('view-lessons');
            Route::get('/uploadLesson', [LessonController::class, 'uploadLesson'])->name('upload-lesson');
            Route::post('/storeLesson', [LessonController::class, 'store'])->name('store-lesson');
        });
        Route::prefix('users/')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('view-users');
            Route::get('/addUser', [UserController::class, 'addUser'])->name('add-user');
            Route::post('/storeUser', [UserController::class, 'store'])->name('store-user');
            Route::get('/editUser/{id}', [UserController::class, 'editUser'])->name('edit-user');
            Route::post('/updateUser', [UserController::class, 'updateUser'])->name('update-user');
            Route::get('/deleteUser/{id}', [UserController::class, 'deleteUser'])->name('delete-user');
            Route::post('/revoke/{id}', [UserController::class, 'revoke'])->name('revoke');
        });
    });
});
