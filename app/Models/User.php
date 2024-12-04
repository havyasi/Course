<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'role' => 'string',
    ];

    /**
     * Relationship: Courses taught by the teacher
     */
    public function courses()
    {
        return $this->hasMany(Course::class, 'teacher_id');
    }

    /**
     * Relationship: Courses the student is enrolled in
     */
    public function enrolledCourses()
    {
        return $this->belongsToMany(Course::class, 'student_course', 'user_id', 'course_id')
                    ->withTimestamps()
                    ->withPivot('progress', 'is_completed');
    }

    /**
     * Relationship: Notifications
     */
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    /**
     * Relationship: Certificates
     */
    public function certificates()
    {
        return $this->hasMany(Certificate::class, 'student_id');
    }

    /**
     * Relationship: Lessons the student has completed
     */
    public function completedLessons()
    {
        return $this->belongsToMany(Lesson::class, 'completed_lessons')
                    ->withTimestamps();
    }

    /**
     * Scope: Query only students
     */
    public function scopeStudents($query)
    {
        return $query->where('role', 'student');
    }

    /**
     * Scope: Query only teachers
     */
    public function scopeTeachers($query)
    {
        return $query->where('role', 'teacher');
    }
}
