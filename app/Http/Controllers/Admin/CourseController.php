<?php

namespace App\Http\Controllers\Admin;

use App\Models\Level;
use App\Models\Course;
use App\Models\Section;
use App\Models\Category;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $levels = Level::all();
        $classrooms = Classroom::all();
        $sections = Section::all();
        $courses = Course::with('categories', 'levels', 'classrooms','sections')
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

        return view('admin.courses.create', compact('categories','levels','sections','classrooms'));
    }

    public function store(Request $request)
    {
        $course = Course::create([
            'course_name' => $request->input('course_name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'period' => $request->input('period'),
            'announce_date' => $request->input('announce_date'),
        ]);

        $course->categories()->attach($request->input('category_id'));
        $course->levels()->attach($request->input('level_id'));
        $course->classrooms()->attach($request->input('classroom_id'));
        $course->sections()->attach($request->input('section_id'));

        return redirect()->route('courses.index')->with('classrooms');
    }

    public function edit($id)
    {
        $course = Course::with('categories')->findOrFail($id);
        $categories = Category::all();
        $levels = Level::all();
        $classrooms = Classroom::all();
        $sections = Section::all();

        return view('admin.courses.edit', compact('course', 'categories','levels','classrooms','sections'));
    }

    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        $course->update([
            'course_name' => $request->input('course_name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'period' => $request->input('period'),
            'announce_date' => $request->input('announce_date'),
        ]);

        // Sync the chosen category
        $course->categories()->sync($request->input('category_id'));
        $course->categories()->sync($request->input('category_id'));
        $course->levels()->sync($request->input('level_id'));
        $course->classrooms()->sync($request->input('classroom_id'));
        $course->sections()->sync($request->input('section_id'));

        return redirect()->route('courses.index');
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return redirect()->route('courses.index');
    }
}
