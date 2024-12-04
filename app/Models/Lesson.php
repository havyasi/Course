<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Lesson extends Model
{

    protected $fillable = [
        'title',
        'description',
        'content',
        'course_id',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}