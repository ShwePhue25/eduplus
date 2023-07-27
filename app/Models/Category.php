<?php

namespace App\Models;

use App\Models\Course;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function courses()
    {

        return $this->belongsToMany(Course::class, 'courses_categories', 'course_id','category_id');
    }

    public function subcategories()
    {

        return $this->belongsToMany(Subcategory::class, 'categories_subcategories','category_id', 'subcategory_id');
    }
}
