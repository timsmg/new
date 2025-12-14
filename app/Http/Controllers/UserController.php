<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function registrationPost(RegistrationRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        User::create($data);

        return redirect()->route('auth');
    }

    public function loginPost(LoginRequest $request)
    {
        if(Auth::attempt($request->validated())){
            if (Auth::user()->is_admin){
                $request->session()->regenerate();
                return redirect()->route('admin');
            }
            $request->session()->regenerate();
            return redirect()->route('main');
        }
        return back()->withErrors(['error' => 'Похоже такого аккаунта нет']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->regenerate();
        return back()->with(['logout' => 'Вы вышли']);
    }
}
