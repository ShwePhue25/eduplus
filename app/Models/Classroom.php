<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classroom extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description','start_date','end_date','capacity'];

    public function courses()
    {

        return $this->belongsToMany(Course::class ,'courses_classrooms', 'course_id','classroom_id');
    }
}
