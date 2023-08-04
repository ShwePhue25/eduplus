<?php

namespace App\Http\Controllers\Admin;

use App\Models\Level;
use App\Models\Course;
use App\Models\Section;
use App\Models\Teacher;
use App\Models\Category;
use App\Models\Classroom;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $courses = Course::with('categories', 'levels', 'classrooms','sections','teachers','subcategories')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        $categories = Category::all();
        $levels = Level::all();
        $classrooms = Classroom::all();
        $sections = Section::all();
        $teachers = Teacher::all();
        $subcategories = Subcategory::all();

        return view('admin.courses.create', compact('categories','levels','sections','classrooms','teachers','subcategories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'course_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'period' => 'required|string|max:255',
            'announce_date' => 'required|date',
            'category_id' => 'required|array',
            'category_id.*' => 'exists:categories,id',
            'subcategory_id' => 'required|array',
            'subcategory_id.*' => 'exists:subcategories,id',
            'level_id' => 'required|array',
            'level_id.*' => 'exists:levels,id',
            'classroom_id' => 'required|array',
            'classroom_id.*' => 'exists:classrooms,id',
            'section_id' => 'required|array',
            'section_id.*' => 'exists:sections,id',
            'teacher_id' => 'required|array',
            'teacher_id.*' => 'exists:teachers,id',
        ]);

        $course = Course::create($data);

        $course->categories()->attach($data['category_id']);
        $course->subcategories()->attach($data['subcategory_id']);
        $course->levels()->attach($data['level_id']);
        $course->classrooms()->attach($data['classroom_id']);
        $course->sections()->attach($data['section_id']);
        $course->teachers()->attach($data['teacher_id']);

        return redirect()->route('courses.index')->with('classrooms');
    }
}
