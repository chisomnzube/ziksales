<?php

namespace App\Http\Controllers\Auth;

use App\CategorySub;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Laravel\Socialite\Facades\Socialite;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        $allSubCategories = CategorySub::all();
        session()->put('previousUrl', url()->previous());

        return view('auth.login')->with([
            'allSubCategories' => $allSubCategories,
        ]);
    }

    public function redirectTo()
        {
            return str_replace(url('/'), '', session()->get('previousUrl', '/'));
        }

     /**
     * Redirect the user to the google authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($service)
    {
        return Socialite::driver($service)->redirect();
    }

    /**
     * Obtain the user information from google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($service)
    {
        //$user = Socialite::driver($service)->user();

        if ($service == 'twitter') 
            {
            	$user = Socialite::driver($service)->user();                
            }else
                {
                    $user = Socialite::driver($service)->stateless()->user();
                }
        

        $email = $user->getEmail();
        //return $user->name;

        $existUser = User::where('email',$email)->first();            

        if($existUser) 
            {
                Auth::loginUsingId($existUser->id);
            }else 
                {
                    return redirect()->route('landing-page')->with('success_message', $user->name.' Kindly Register');
                }
        return redirect()->to('/');
    }    
}
