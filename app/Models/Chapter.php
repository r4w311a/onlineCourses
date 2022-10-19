<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use SoftDeletes;
    public function Course(){
        return $this->belongsTo(Course::class,'course_id','id');
    }
}
