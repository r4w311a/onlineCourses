<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Carbon;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::withCount('lessons')->get();
        
        return view('admin.pages.courses.index', compact('courses'));
    }
    public function addCourse()
    {
        return view('admin.pages.courses.add');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'course_name' => 'required|unique:courses|max:255',
        ]);
        // insert record in db
        Course::insert([
            'course_name' => $request->course_name,
            'course_slug' => strtolower(str_replace(' ', '-', $request->course_name)),
            'created_at' => Carbon::now(),
        ]);
        return Redirect('/admin/courses/')->with('success', 'Course added successfully');
    }
    public function editCourse($id)
    {
        $course = Course::find($id);
        return view('admin.pages.courses.edit', compact('course'));
    }
    public function updateCourse(Request $request)
    {
        $course_id = $request->id;
        $validated = $request->validate([
            'course_name' => 'required|unique:courses|max:255',
        ]);
        // update record in db
        Course::find($course_id)->update([
            'course_name' => $request->course_name,
            'course_slug' => strtolower(str_replace(' ', '-', $request->course_name)),
            'updated_at' => Carbon::now(),
        ]);
        return Redirect('/admin/courses/')->with('success', 'Course updated successfully');
    }   
    public function deleteCourse($id)
    {
        Course::find($id)->delete();
        return Redirect('/admin/courses/')->with('success', 'Course deleted successfully');
    }
}
