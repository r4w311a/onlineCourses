<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Chapter;
use Illuminate\Support\Carbon;

class ChapterController extends Controller
{
    public function index()
    {
        // retrieve all chapters from database in ascending order by chapter_num 
        $chapters = Chapter::orderBy('chapter_num', 'asc')->get();
        /* $chapters = Chapter::all(); */
        return view('admin.pages.chapters.index', compact('chapters'));
    }

    public function addChapter()
    {
        $courses = Course::orderBy('course_name', 'ASC')->get();
        return view('admin.pages.chapters.add', compact('courses'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'course_id' => 'required',
            'chapter_num' => 'required|numeric',
        ]);

        Chapter::insert([
            'course_id' => $request->course_id,
            'chapter_num' => $request->chapter_num,
            'created_at' => Carbon::now(),
        ]);
        return Redirect('/admin/chapters/')->with('success', 'Chapter added successfully');
    }
    public function deleteChapter($id)
    {
        Chapter::find($id)->delete();
        return Redirect('/admin/chapters/')->with('success', 'Chapter deleted successfully');
    }
}
