<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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

        // dd($data);

        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'gender' => ['required'],
            'phone' => ['required', 'digits_between:10,12'],
            'firstName' => ['required', 'string','max:255'],
            'lastName' => ['required','string','max:255'],
            'dob' => ['required'],
            'role' => ['required'],
            'city' => ['required','string','max:255'],
            'state' => ['required','string','max:255'],
            'zip' => ['required','string','max:255'],
            'currentAddress' => ['required'],
            'permanentAddress' => ['required']


        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {


        $user = User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $user->assignRole($data['role']);

        Profile::create([
            'user_id' => $user->id,
            'firstName' =>  $data['firstName'],
            'lastName' =>  $data['lastName'],
            'city' =>  $data['city'],
            'state' =>  $data['state'],
            'zip' =>  $data['zip'],
            'currentAddress' =>  $data['currentAddress'],
            'permanentAddress' =>  $data['permanentAddress'],
            'gender' =>  $data['gender'],
            'phone' =>  $data['phone'],
            'dob' =>  $data['dob'],

        ]);

        return $user;
    }
}
