<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = ['title', 'body', 'teacher_id'];
    
    public function course() {
        return $this->belongsTo(Course::class);
    }
    
    public function teacher() {
        return $this->belongsTo(User::class, 'teacher_id');
    }
    
}
