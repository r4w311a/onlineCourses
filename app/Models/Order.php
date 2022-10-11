<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function User(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function Course(){
        return $this->belongsTo(Course::class,'course_id','id');
    }
}
