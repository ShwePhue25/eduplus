<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Level extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function courses()
    {

        return $this->belongsToMany(Course::class, 'courses_levels', 'course_id','level_id');
    }
}
