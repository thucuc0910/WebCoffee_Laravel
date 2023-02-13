<?php

namespace App\Http\Services\User;

use App\Http\Controllers\MainController;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserService 
{
    public function create($request)
    {
        try {
            User::create([
                'full_name' => (string) $request->input('full_name'),
                'phone' => (string) $request->input('phone'),
                'address' => (string) $request->input('address'),
                'email' => (string) $request->input('email'),
                'password' => (string) bcrypt($request->input('password')),
                // 'type' => (string) $request->input('type'),
                'level' => (string) $request->input('level'),
            ]);
 
            session()->flash('success', 'Tạo Nhân viên thành công');
             //dd ($request->input());
         } catch (\Exception $err) {
             session()->flash('error', $err->getMessage());
             return false;
         }
 
         return true;
    }

    public function get()
    {
        return User::orderByDesc('id')->paginate(15);
    }


    // public function update($request, $user) 
    // {
    //     $user->fill($request->input());
    //     $user->save();
    //     // if ($request->input('parent_id') != $menu->id){
    //     //     $menu->parent_id = (string) $request->input('parent_id');
    //     // }

    //     $user->name = (string) $request->input('name');  
    //     $user->phone= (string) $request->input('phone');
    //     $user->address = (string) $request->input('address');
    //     $user->email = (string) $request->input('email');
    //     $user->save();

    //     session()->flash('success', 'Cập Nhật Nhân viên thành công');
    //     return true;
    // }

    

    public function destroy($request)
    {
        $user = User::where('id', $request->input('id'))->first();
        if ($user) {
            $user->delete();
            return true;
        }

        return false;
    }

    // public function show()
    // {
    //     return User::where('active', 1)->orderByDesc('sort_by')->get();
    // }
}