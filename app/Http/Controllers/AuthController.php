<?php

namespace App\Http\Controllers;

use App\Models\User;
use Twilio\Rest\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Create a new user instance with phone number.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function getStart(Request $request)
    {
        $data = $request->validate([
            'phone_number' => ['required', 'numeric', 'unique:users'],
        ]);
        /* Get credentials from .env */
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_sid = getenv("TWILIO_SID");
        $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
        $twilio = new Client($twilio_sid, $token);
        $twilio->verify->v2->services($twilio_verify_sid)
            ->verifications
            ->create($data['phone_number'], "sms");

        User::create([
            'name' => 'your name',
            'phone_number' => $data['phone_number'],
            'dob' => '2000-01-01',
            'password' => '11111111',
        ]);
        return redirect()->route('verify')->with(['phone_number' => $data['phone_number']]);
    }


    protected function verify(Request $request)
    {
        $data = $request->validate([
            'verification_code' => ['required', 'numeric'],
            'phone_number' => ['required', 'string'],
        ]);
        /* Get credentials from .env */
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_sid = getenv("TWILIO_SID");
        $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
        $twilio = new Client($twilio_sid, $token);
        $verification = $twilio->verify->v2->services($twilio_verify_sid)
            ->verificationChecks
            ->create(['code' => $data['verification_code'], 'to' => $data['phone_number']]);

        if ($verification->valid) {
            $user = tap(User::where('phone_number', $data['phone_number']))->update(['isVerified' => true]);
            /* Authenticate user */
            return redirect()->route('user.create')->with(['message' => 'Successfully Registered']);
        }
        return back()->with(['phone_number' => $data['phone_number'], 'error' => 'Invalid verification code entered!']);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function createUser(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'dob' => 'required|date_format:Y-m-d|before:today',
            'gender' => 'nullable|in:male,female,other',
            'phone_number' => 'nullable|string|max:255',
            'password'=>'required', 'string', 'min:8', 'confirmed',
        ]);

        $user = Auth::user();

        if ($user) {
            $user->name = $data['name'];
            $user->dob = $data['dob'];
            $user->gender = $data['gender'];
            $user->password = Hash::make($data['password']);

            $user->save();

            Auth::login($user->first());

            return redirect()->route('dashboard',compact('user'))->with(['message' => 'Register Success']);
        }
        return redirect()->back()->with('error', 'User not found.');
    }
}
