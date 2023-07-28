<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\Admin\ClassController;
use App\Http\Controllers\Admin\LevelController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubcategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**Teacher Routes*/
// Route::group(['middleware' => 'admin'], function () {
Route::get('/teacher/login',[LoginController::class,'showTeacherLoginForm'])->name('teacher.login-view');
Route::post('/teacher/login',[LoginController::class,'loginAsTeacher'])->name('teacher.login');
Route::get('/teacher/register',[RegisterController::class,'showTeacherRegisterForm'])->name('teacher.register-view');
Route::post('/teacher/register',[RegisterController::class,'createTeacher'])->name('teacher.register');
Route::get('/auth/google', [GoogleAuthController::class,'redirectToGoogle'])->name('google.auth');
Route::get('/auth/google/callback', [GoogleAuthController::class,'handleGoogleCallback']);
Route::post('/meeting/create', [MeetingController::class,'create'])->name('meeting.create');
Route::get('/meeting/create', function(){
    return view('teacher.meeting');
})->name('view-meeting');
Route::get('/success', function(){
    return view('teacher.success');
});
// });

/**User Routes*/
Route::post('/phone/register', [AuthController::class,'getStart'])->name('register');
Route::post('/otp/verify', [AuthController::class,'verify'])->name('verify');
Route::post('/user/create', [AuthController::class,'createUser'])->name('user.create');
Route::get('/state/show', [StateController::class, 'index']);
Route::post('api/fetch-states', [StateController::class, 'fetchState']);
Route::post('api/fetch-cities', [StateController::class, 'fetchCity']);
Route::get('/', function () {
    return view('welcome');
});
Route::get('/phone/register', function () {
    return view('auth.register');
});
Route::get('otp/verify', function () {
    return view('auth.verify');
});
Route::get('/student/create', function () {
    return view('user.create');
});
Route::get('/student/dashboard', function () {
    return view('user.dashboard');
})->name('dashboard');

/**Admin Routes */
// Route::group(['middleware' => 'isAdmin'], function () {
Route::get('/admin/login',[LoginController::class,'showAdminLoginForm'])->name('admin.login-view');
Route::post('/admin/login',[LoginController::class,'adminLogin'])->name('admin.login');
Route::get('/admin/register',[RegisterController::class,'showAdminRegisterForm'])->name('admin.register-view');
Route::post('/admin/register',[RegisterController::class,'createAdmin'])->name('admin.register');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/admin/dashboard',function(){
    return view('admin.dashboard');
});

/**Course routes */
Route::get('/courses/create', [CourseController::class,'create'])->name('courses.create');
Route::post('/courses/create', [CourseController::class,'store'])->name('courses.store');
Route::get('/courses/show', [CourseController::class,'showAvailableCourses'])->name('courses.showAvailableCourses');
Route::post('/courses/{course}', [CourseController::class,'enrollInCourse'])->name('courses.enrollInCourse');

/**Levels routes */
Route::get('/levels', [LevelController::class, 'index'])->name('levels.index');
Route::get('/levels/create', [LevelController::class, 'create'])->name('levels.create');
Route::post('/levels', [LevelController::class, 'store'])->name('levels.store');
Route::get('/levels/{level}', [LevelController::class, 'show'])->name('levels.show');
Route::get('/levels/{level}/edit', [LevelController::class, 'edit'])->name('levels.edit');
Route::put('/levels/{level}', [LevelController::class, 'update'])->name('levels.update');
Route::delete('/levels/{level}', [LevelController::class, 'destroy'])->name('levels.destroy');

/**Section routes */
Route::get('/sections', [SectionController::class, 'index'])->name('sections.index');
Route::get('/sections/create', [SectionController::class, 'create'])->name('sections.create');
Route::post('/sections', [SectionController::class, 'store'])->name('sections.store');
Route::get('/sections/{section}', [SectionController::class, 'show'])->name('sections.show');
Route::get('/sections/{section}/edit', [SectionController::class, 'edit'])->name('sections.edit');
Route::put('/sections/{section}', [SectionController::class, 'update'])->name('sections.update');
Route::delete('/sections/{section}', [SectionController::class, 'destroy'])->name('sections.destroy');

/**Class routes */
Route::get('/classes', [ClassController::class, 'index'])->name('classes.index');
Route::get('/classes/create', [ClassController::class, 'create'])->name('classes.create');
Route::post('/classes', [ClassController::class, 'store'])->name('classes.store');
Route::get('/classes/{class}', [ClassController::class, 'show'])->name('classes.show');
Route::get('/classes/{class}/edit', [ClassController::class, 'edit'])->name('classes.edit');
Route::put('/classes/{class}', [ClassController::class, 'update'])->name('classes.update');
Route::delete('/classes/{class}', [ClassController::class, 'destroy'])->name('classes.destroy');

/**Category routes*/
Route::get('/categories', [CategoryController::class,'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class,'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class,'store'])->name('categories.store');
Route::get('/categories/{id}/edit', [CategoryController::class,'edit'])->name('categories.edit');
Route::put('/categories/{id}', [CategoryController::class,'update'])->name('categories.update');
Route::delete('/categories/{id}', [CategoryController::class,'destroy'])->name('categories.destroy');

/**Subategory routes*/
Route::get('/subcategories', [SubcategoryController::class,'index'])->name('subcategories.index');
Route::get('/subcategories/create', [SubcategoryController::class,'create'])->name('subcategories.create');
Route::post('/subcategories', [SubcategoryController::class,'store'])->name('subcategories.store');
Route::get('/subcategories/{id}/edit', [SubcategoryController::class,'edit'])->name('subcategories.edit');
Route::put('/subcategories/{id}', [SubcategoryController::class,'update'])->name('subcategories.update');
Route::delete('/subcategories/{id}', [SubcategoryController::class,'destroy'])->name('subcategories.destroy');

/**Course routes */
Route::get('/courses', [CourseController::class,'index'])->name('courses.index');
Route::get('/courses/create', [CourseController::class,'create'])->name('courses.create');
Route::post('/courses', [CourseController::class,'store'])->name('courses.store');
Route::get('/courses/{id}', [CourseController::class,'show'])->name('courses.show');
Route::get('/courses/{id}/edit', [CourseController::class,'edit'])->name('courses.edit');
Route::put('/courses/{id}', [CourseController::class,'update'])->name('courses.update');
Route::delete('/courses/{id}', [CourseController::class,'destroy'])->name('courses.destroy');
Route::get('/teachers/{teacherId}/courses', [CourseController::class, 'coursesTaughtByTeacher'])->name('courses.taught.by.teacher');

/**Teacher routes */
Route::get('/teachers/create', [TeacherController::class, 'create'])->name('teachers.create');
Route::post('/teachers', [TeacherController::class, 'store'])->name('teachers.store');
Route::get('/teachers/{teacher}/edit', [TeacherController::class, 'edit'])->name('teachers.edit');
Route::put('/teachers/{teacher}', [TeacherController::class, 'update'])->name('teachers.update');
Route::delete('/teachers/{teacher}', [TeacherController::class, 'destroy'])->name('teachers.destroy');
Route::get('/teachers/{teacher}', [TeacherController::class, 'show'])->name('teachers.show');
Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers.index');

// });
