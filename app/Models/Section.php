<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Section extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description','start_time','end_time','capacity'];

    public function courses()
    {

        return $this->belongsToMany(Course::class, 'courses_sections', 'course_id','section_id');
    }
}
