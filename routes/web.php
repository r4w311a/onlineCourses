<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Lesson;
use App\Models\Chapter;
use App\Models\OrderItem;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('dashboard', function () {

        $user_id = Auth::id();
        $course_id = Order::where('user_id', $user_id)->pluck('course_id');
        /* $chapter_id = OrderItem::where('order_id', $course_id)->pluck('chapter_id'); */
        $chapters = Chapter::whereIn('course_id', $course_id)->get();

        /* $orderitems = OrderItem::where('user_id', $user_id)->get();
            $ordersInfo = Order::where('user_id', $user_id)->limit(1)->get(); */
        /* $chapters = Chapter::where('course_id', $id)->get(); */
        return view('index', compact('chapters'));
    })->name('dashboard')->middleware(['auth', 'device']);

    Route::get('/watch/{id}', function ($id) {
        $user_id = Auth::id();
        $lessons = Lesson::where('chapter_id', $id)->get();
        return view('watch', compact('lessons'));
    })->name('watch-lessons')->middleware(['auth', 'device']);
    
});

// get user agent
Route::get('/user-agent', function () {
    $ua = request()->userAgent();
    dd($ua);
})->name('user-agent');

Route::get('/test', function () {
    return view('test');
})->middleware(['auth', 'device']);





require 'admin.php';
