<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLoginRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    protected $user;
    public function __construct(User $user)
    {
        $this->user= $user;
    }

    public function showLogin()
    {
        return view('login.login');
    }

    public function login(CreateLoginRequest $request)
    {
        $users = $this->user->all();
        foreach ($users as $user){
            if ($user->name == $request->name && $user->password == $request->password){
                Session::put('isLogin', $user->email);
            }else
                return redirect()->route('show.login');
        }
        return redirect()->route('students.index');
    }
    public function logout()
    {
        Session::remove('isLogin');
        return redirect()->route('students.index');
    }

}
