<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:teacher')->except('logout');
    }

    public function showAdminLoginForm()
    {
        return view('auth.login', ['url' => route('admin.login-view'), 'title'=>'Admin']);
    }

    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email|ends_with:@ilbcedu.com',
            'password' => 'required|min:8'
        ]);

        if (Auth::guard('admin')->attempt($request->only(['email','password']), $request->get('remember'))){
            return redirect()->intended('/admin/dashboard');
        }

        return back()->withInput($request->only('email', 'remember'));
    }

    public function showTeacherLoginForm()
    {
        return view('auth.login', ['url' => route('teacher.login-view'), 'title'=>'Teacher']);
    }

    public function loginAsTeacher(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email|ends_with:@ilbcedu.com',
            'password' => 'required|min:8'
        ]);

        if (\Auth::guard('teacher')->attempt($request->only(['email','password']), $request->get('remember'))){

            return redirect()->intended('/teacher/dashboard');
        }

        return back()->withInput($request->only('email', 'remember'));
    }
}
