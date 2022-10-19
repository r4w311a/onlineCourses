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
    public function Chapter(){
        return $this->belongsTo(Chapter::class,'chapter_id','id');
    }
    public function Order(){
        return $this->belongsTo(Order::class,'order_id','id');
    }
}
