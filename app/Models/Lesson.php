<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use SoftDeletes;
    protected $fillable = ['course_id','lesson_name', 'chapter_num', 'lesson_slug'];

    public function Course(){
        return $this->belongsTo(Course::class,'course_id','id');
    }
}
