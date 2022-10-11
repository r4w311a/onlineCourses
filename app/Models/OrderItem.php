<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    public function Lesson(){
        return $this->belongsTo(Lesson::class,'lesson_id','id');
    }
}
