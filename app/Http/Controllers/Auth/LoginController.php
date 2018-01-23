<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use File; 
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;


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
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

     protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();
        $this->clearLoginAttempts($request);
        if ($request->ajax()) {
            return response()->json(['authenticated' => true], 200);
        }
        return $this->authenticated($request, $this->guard()->user())
                ?: redirect()->intended($this->redirectPath());
    }
    protected function sendFailedLoginResponse(Request $request)
    {
        if ($request->ajax()) {
            return response()->json([
                'authenticated' => false,
            ], 401);
        }
        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'));
    }

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();

        $findUser = User::where('email',$user->email)->first();

        if ($findUser) {
            $this->guard()->login($findUser);    
            return redirect('/dashboard');

        } else {
            $u = new User;

            $u->user_fullname = $user->name;
            $u->email = $user->email;
            $u->password = bcrypt(123456);   
            $fileContents = file_get_contents($user->getAvatar());
            $fname = $user->getId(). ".jpg";
            File::put(public_path() . '/storage/user_avatars/' . $user->getId() . ".jpg", $fileContents);
            $u->avatar = $fname;
            $u->save();
            $userlogin = User::where('email',$user->email)->first();
            $this->guard()->login($userlogin);
            return redirect('/dashboard');
    }
    }

    public function guard()
    {
        return Auth::guard('user');
    }

    
}
