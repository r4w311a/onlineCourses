<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use SoftDeletes;
    protected $fillable = ['course_name', 'course_slug'];

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
