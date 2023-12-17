<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegistrationRequest;

class UserControlller extends Controller
{
    public function register(){
        return view('user.register');
    }
    public function registeruser(RegistrationRequest $request)
    {
        $validatedData = $request->validated();
        $user = new User([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        $user->save();

        if($user){
            return redirect(url('/login'))->with('success', 'User registered successfully! Plase login now');
        }
    }
    public function login(){
        if(auth()->check()){
            return redirect(url('/'));
        }
        return view('user.login');
    }

    public function loginuser(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('web')->attempt($validatedData)) {
            return redirect('/')->with('success', 'Login successful!');
        }
        return redirect()->back()
        ->withInput()
        ->withErrors(['email' => 'Invalid email or password']);


    }
    public function dashboard(){
        $user_id = auth()->id();
        $orderCount = Order::where('user_id',$user_id)->count();
        return view('user.dashboard', compact('orderCount'));
    }
    public function profile(){
        return view('user.profile');
    }

    public function profileupdate(Request $request){
        $UserUpdate = $request->all();

        $User = User::find($UserUpdate['user_id']);
        $User->update([
            'name' => $UserUpdate['name'],
            'email' => $UserUpdate['email'],
        ]);
        return redirect(url('/profile'))->with('success', 'Profile update successfully');
    }

    public function logout(){
        Auth::guard('web')->logout();
        return redirect('/')->with('success', 'User Logout successful!');
    }
}
