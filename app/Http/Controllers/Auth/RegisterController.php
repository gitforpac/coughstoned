<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Role_User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Rules\greaterThan;



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
    protected $redirectTo = '/home';

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
        $messages = [
            'unique' => 'This :attribute is already registered. You might want to <span><a href="#login-form" data-toggle="modal" id="reg-login-modal" data-dismiss="modal">login</a></span>',
            'min' => 'Password is weak, should atleast be 6 characters'
        ];

         $vaild =   Validator::make($data, [
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
            'birthdate_month' => 'required|max:255',
            'birthdate_day' => 'required|max:255',
            'birthdate_year' => ['required', new greaterThan],
        ],$messages);

        if($vaild->fails()){
            return json_encode($vaild->errors());
        }

        return true;

    }

    public function register(Request $request)
    {
        $v = $this->validator($request->all());

        if(!is_bool($v)){
            return $v;
        }

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }



    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'birthdate' => $data['birthdate_month'] .' '. $data['birthdate_day'] .' '. $data['birthdate_year'],
            'user_fullname' => $data['firstname'].' '.$data['lastname'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'avatar' => 'da.jpg',
        ]);

    }

    protected function registered(Request $request, $user)
    {
        return "true";
    }

    protected function guard()
    {
        return Auth::guard('user');
    }


}
