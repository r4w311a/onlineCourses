<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\Course;
use App\Models\Order;
use App\Models\Chapter;
use App\Models\OrderItem;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class LessonController extends Controller
{
    public function index()
    {
        $lessons = Lesson::all();
        return view('admin.pages.lessons.index', compact('lessons'));
    }
    public function uploadLesson()
    {
        $chapters = Chapter::orderBy('chapter_num', 'asc')->get();
        $courses = Course::orderBy('course_name', 'ASC')->get();
        return view('admin.pages.lessons.upload', compact('courses', 'chapters'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'lesson_link' => 'required|mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts|max:2G',
            'course_id' => 'required',
            'chapter_id' => 'required|numeric',
        ]);

        
        if ($request->hasFile('lesson_link')) {
            $lesson_link = $request->file('lesson_link');
            $LessonName = time() . '.' . $request->lesson_link->extension();
            /* $lesson_link->storeAs('lessons/', $LessonName, 's3'); */
            $lesson_link->move(public_path('/uploads'), $LessonName);
        }

        Lesson::insert([
            'lesson_link' => $LessonName,
            'course_id' => $request->course_id,
            'chapter_id' => $request->chapter_id,
            'lesson_slug' => $request->course_id . mt_rand(1000000, 9999999),
            'created_at' => Carbon::now(),
        ]);

        $orders = Order::where('course_id', $request->course_id)->get();
        $lesson = Lesson::all()->last();
        foreach ($orders as $order) {
            $order_id = $order->id;
            $user_id = $order->user_id;
            OrderItem::insert([
                'user_id' => $user_id,
                'order_id' => $order_id,
                'lesson_id' => $lesson->id,
                'created_at' => Carbon::now(),
            ]);
        }

        return Redirect('/admin/lessons/')->with('success', 'Lesson added successfully');
    }
}
