<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
    // protected $redirectTo = RouteServiceProvider::HOME;
    // protected function redirectTO(){
    //     if (Auth()->user()->role == 1) {
    //         return route('admin.home');
    //     } elseif(Auth()->user()->role ==2) {
    //         return route('user.home');
    //     }

    // }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request){
        // $input = $request->all();
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required|min:8|max:25'
        ]);

        // if( auth()->attempt(array('email'=>$input['email'], 'password'=>$input['password'])) ){

        //  if( auth()->user()->role == 1 ){
        //      return redirect()->route('admin.home');
        //  }
        //  elseif( auth()->user()->role == 2 ){
        //      return redirect()->route('user.home');
        //  }

        // }else{
        //     return redirect()->route('login')->with('gagal','Email atau password salah');
        // }

            // if (Auth::guard('userr')->attempt(array('email'=>$request->email,'password'=>$request->password))) {
            //     return redirect()->route('user.home');
            // }elseif (Auth::guard('adminn')->attempt(array('email'=>$request->email,'password'=>$request->password))) {
            //     return redirect()->route('admin.home');
            // }
            // else {
            //     return redirect()->back()->with('gagal','email atau password tidak di temukan atau salah');
            // }
            $request->session()->regenerate();

                if (Auth::guard('user')->attempt($request->only('email','password'))) {
                    return redirect()->route('user-home');
                }elseif (Auth::guard('admin')->attempt($request->only('email','password'))) {
                    return redirect()->route('admin-home');
                }else{
                    return back()->with('gagal','email / password salah / tidak di temukan');
                };


     }
}
