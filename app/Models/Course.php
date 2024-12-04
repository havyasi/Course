<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['name', 'description', 'teacher_id', 'start_date', 'end_date','image'];

    public function teacher() {
        return $this->belongsTo(User::class, 'teacher_id');
    }
    
    public function contents() {
        return $this->hasMany(Content::class);
    }
    
    public function enrollments() {
        return $this->hasMany(Enrollment::class);
    }
    
    public function discussions() {
        return $this->hasMany(Discussion::class);
    }

    public function students()
{
    return $this->belongsToMany(User::class, 'student_course', 'course_id', 'user_id')
                ->withTimestamps()
                ->withPivot('progress', 'is_completed');
}
}
