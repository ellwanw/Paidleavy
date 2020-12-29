<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {   
        $input = $request->all();
        $remember_me = $request->has('remember') ? true : false;


        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt(array('username' => $input['username'], 'password' => $input['password']),$remember_me))
        {
            if (auth()->user()->is_admin == 1) {
                return redirect()->route('admin.home');
            }elseif(auth()->user()->is_admin == 0) {
                return redirect()->route('user.home');
            }
        }else{
            alert()->error('Username and password are wrong!');

            return redirect('/login');
        }
    }
}