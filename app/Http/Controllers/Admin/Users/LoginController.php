<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\ElseIf_;
use Illuminate\Support\Facades\Redirect;
class LoginController extends Controller
{
    //
    public function index()
    {
        return view('admin.users.login', ['title' => "Đăng nhập hệ thống"]);
    }

    public function store(Request $request)
    {
        // dd($request->input());

        $this->validate($request, [
            'email' => 'required|email:filter',
            'password' => 'required',
            'level' 
        ],);

        if (Auth::attempt([

                'email' => $request->input(key: 'email'),
                'password' => $request->input(key: 'password'),
                'level' => 0
            ], $request->input(key: 'remember'))) {

            session()->flash('success', 'Đăng nhập thành công');
            return redirect()->route(route: 'admin');
        }
        elseif(Auth::attempt([

                'email' => $request->input(key: 'email'),
                'password' => $request->input(key: 'password'),
                'level' => 1
            ], $request->input(key: 'remember'))){
                
                session()->flash('success', 'Đăng nhập thành công');
                return redirect()->route(route: 'user');
        }


        session()->flash('error', 'Email hoặc Mật khẩu không chính xác');
        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
