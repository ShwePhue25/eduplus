<?php

namespace App\Models;

use App\Models\Course;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Video extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['title','url','duration'];

    public function courses()
    {

        return $this->belongsTo(Course::class,'courses_videos', 'course_id','video_id');
    }

    public function categories()
    {

        return $this->belongsTo(Category::class,'videos_categories','category_id', 'video_id');
    }
}
