<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Mail\RegisteredUser;
use App\CategorySub;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:25',
            'lname' => 'required|string|max:25',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'required|string|min:11|max:14',
            'address' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'lname' => $data['lname'],
            'email' => $data['email'],
            'phone' =>$data['phone'],
            'address' => $data['address'],
            'password' => Hash::make($data['password']),
        ]);
    }

         /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $allSubCategories = CategorySub::all();
        session()->put('previousUrl', url()->previous());

        return view('auth.register')->with([
            'allSubCategories' => $allSubCategories,
        ]);
    }

    public function redirectTo()
        {
            return str_replace(url('/'), '', session()->get('previousUrl', '/'));
        }
}
