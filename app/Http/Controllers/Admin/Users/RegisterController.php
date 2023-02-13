<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\ElseIf_;
use Illuminate\Support\Facades\Hash;

use App\Models\User;



class RegisterController extends Controller
{
    //
    public function index()
    {
        return view('admin.users.register', ['title' => "Đăng kí tài khoản"]);
    }

    public function account(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:20',
            'full_name' => 'required',
            'address' => 'required',
            're_password' => 'required|same:password'

        ],
        [
            'email.required' => 'Vui lòng nhập email !',
            'email.email' => 'Không đúng định dạng email !',
            'email.unique' => 'Email đã được đăng kí !',
            'password.required' => 'Vui lòng nhập mật khẩu !',
            'address.required' => 'Vui lòng nhập địa chỉ !',
            're_password.same' => 'Mật khẩu không giống nhau !',
            'password.min' => 'Mật khẩu ít nhất 6 kí tự !',
        ]);

        $user = new User();
        $user->full_name = $request->full_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->level = 1;
        $user->save();
        Session()->flash('thanhcong','Tạo tài khoản thành công');
        return redirect()->back();

    }


   
}