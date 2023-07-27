<?php

namespace App\Models;

use App\Models\User;
use App\Models\Level;
use App\Models\Teacher;
use App\Models\Category;
use App\Models\Classroom;
use App\Models\Enrollment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['course_name', 'description','price','period','announce_date'];

    public function categories()
    {

        return $this->belongsToMany(Category::class, 'courses_categories', 'course_id', 'category_id');
    }

    public function levels()
    {

        return $this->belongsToMany(Level::class, 'courses_levels', 'course_id','level_id');
    }

    public function sections()
    {

        return $this->belongsToMany(Section::class, 'courses_sections', 'course_id','section_id');
    }

    public function students()
    {

        return $this->belongsToMany(User::class, 'students_courses', 'course_id','user_id');
    }

    public function enrollments()
    {

        return $this->belongsToMany(Enrollment::class, 'courses_enrollments', 'course_id','enrollment_id');
    }

    public function classrooms()
    {

        return $this->belongsToMany(Classroom::class,'courses_classrooms', 'course_id','classroom_id');
    }

    public function teachers()
    {

        return $this->belongsToMany(Teacher::class,'teacher_courses', 'course_id','teacher_id');
    }
}
