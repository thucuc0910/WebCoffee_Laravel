<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Requests\User\UserRequest;

use App\Http\Services\User\UserService;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Js;
use App\Models\User;

class MainController extends Controller
{

    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    //
    public function index()
    {
        return view('admin.main', [
            'title' => 'Trang Quản Trị Admin'
        ]);
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function create()
    {
        return view('admin.users.add', [
            'title' => 'Thêm người dùng mới',
            // 'users' => $this->userService->getParent()
        ]);
        //echo 123;
    }

    public function store(UserRequest $request)
    {
        //dd($request->input());
        $this->userService->create($request);

        return redirect()->back();
    }

    

    public function list()
    {
        return view('admin.users.list', [
            'title' => "Danh sách người dùng",
            'users' => $this->userService->get()
        ]);
    }


    public function destroy(Request $request): JsonResponse
    {
        $result = $this->userService->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công nhân viên'
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }
}
