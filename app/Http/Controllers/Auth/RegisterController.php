<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Notifications\verifyUserNotification;

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
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'first_name' =>'required | string |max:255',
    //         'email'      =>'required| string |email | max:255 |unique',
    //         'password'   => 'required| string|min:8 |confirmed',
    //         'parmanent_address'=>'required | max: 100',
    //         //'division_id'=>'required | numberic',
    //         //'districs_id'=>'required | numberic',
    //         'phone_number'=>'required | min:11|max:15|unique',
    //     ]);
    // }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function register(Request $request)
    {
        $request->validate([
           'first_name' =>'required | string |max:255',
           'email'      =>'required| string |email | max:255 |unique:users',
           'password'   => 'required| string|min:8 |confirmed',
           'parmanent_address'=>'required | max: 100',
                //'division_id'=>'required | numberic',
                //'districs_id'=>'required | numberic',
            'phone_number'=>'required | min:11|max:15|unique:users',
        ]);
    $user=User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'user_name' => str::slug($request->first_name.$request->last_name),
            'phone_number' => $request->phone_number,
            'division_id' => $request->division_id,
            'districs_id' => $request->districs_id,
            'parmanent_address' => $request->parmanent_address,
            'ip_address' => request()->ip(),
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'remember_token'=> Str::random(40),
            'status'=> 0,
        ]);
        $user->notify(new verifyUserNotification($user));
         session()->flash('success','A confrim messege sent your email.Plz check your email');
        return redirect()->back();
      
    }
}
