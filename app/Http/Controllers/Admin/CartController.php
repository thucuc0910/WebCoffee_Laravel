<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Services\CartService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Bill;

use App\Models\Order;
use App\Http\Controllers\Admin\User;

class CartController extends Controller
{
    public function index()
    {
        $this->data['title'] = 'Quản lý đơn hàng_Tất cả đơn hàng';
        $orders = DB::table('orders')
            ->orderByDesc('id')
            ->get();
        $this->data['orders'] = $orders;
        return view('admin.carts.order', $this->data);
    }
    public function index1()
    {
        $this->data['title'] = 'Quản lý đơn hàng_Chờ xử lý';
        $orders = DB::table('orders')
            ->orderByDesc('id')
            ->where('active', 1)
            ->get();
        $this->data['orders'] = $orders;
        return view('admin.carts.order', $this->data);
    }
    public function index2()
    {
        $this->data['title'] = 'Quản lý đơn hàng_Đang giao';
        $orders = DB::table('orders')
            ->orderByDesc('id')
            ->where('active', 2)
            ->get();
        $this->data['orders'] = $orders;
        return view('admin.carts.order', $this->data);
    }
    public function index3()
    {
        $this->data['title'] = 'Quản lý đơn hàng_Đã hoàn thành';
        $orders = DB::table('orders')
            ->orderByDesc('id')
            ->where('active', 3)
            ->get();
        $this->data['orders'] = $orders;
        return view('admin.carts.order', $this->data);
    }
    public function index0()
    {
        $this->data['title'] = 'Quản lý đơn hàng_Đã bị huỷ';
        $orders = DB::table('orders')
            ->orderByDesc('id')
            ->where('active', 0)
            ->get();
        $this->data['orders'] = $orders;
        return view('admin.carts.order', $this->data);
    }

    public function detail($id)
    {
        $this->data['title'] = 'Chi tiết đơn hàng';
        $customerInfo = DB::table('orders')
        ->select('orders.*')
        ->where('orders.id', '=', $id)
        ->first();

        
        // echo 123;
        $orderById = DB::table('orders_detail')
            ->join('products', 'orders_detail.product_id', '=', 'products.id')
            ->select('orders_detail.*', 'products.*')
            ->where('orders_detail.order_id', '=', $id) ->get();
        
        // echo '<pre>';
        //     print_r($orderById);
        // echo '</pre>';

        $this->data['customerInfo'] = $customerInfo;
        $this->data['orderById'] = $orderById;
        return view('admin.carts.orderdetail', $this->data);
    }

    public function updateOrder(Request $request, $id){


        // dd($id);

        $order = Order::find($id);
        $order->active = $request->input('active');
        $order->save();

        Session::flash('message', "Successfully updated");

        return redirect()->back();

        
    }

    public function destroy($id)
    {
    }
}
