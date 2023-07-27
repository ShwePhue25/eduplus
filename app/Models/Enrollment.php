<?php

namespace App\Models;

use App\Models\User;
use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Enrollment extends Model
{
    use HasFactory;

    public function students()
    {

        return $this->belongsToMany(User::class, 'students_enrollments', 'enrollment_id','user_id');
    }

    public function courses()
    {

        return $this->belongsToMany(Course::class, 'courses_enrollments', 'enrollment_id','course_id');
    }
}
