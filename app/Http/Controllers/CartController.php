<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Services\CartService;
use App\Models\Order;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index(Request $request)
    {
        $result = $this->cartService->create($request);
        if ($result === false) {
            return redirect()->back();
        }

        return redirect('/carts');
    }

    public function show()
    {
        $products = $this->cartService->getProduct();

        return view('carts.list', [
            'title' => 'Giỏ Hàng',
            'products' => $products,
            'carts' => Session::get('carts')
        ]);
    }

    public function indexCheckout()
    {
        $products = $this->cartService->getProduct();

        if( Auth::check()){
            return view('carts.checkout', [
                'title' => 'Giỏ Hàng',
                'products' => $products,
                'carts' => Session::get('carts')
            ]);
        }
        else{
            return redirect('/login');

        }
        
        
    }

    public function update(Request $request)
    {
        $this->cartService->update($request);

        return redirect('/carts');
    }

    public function remove($id = 0)
    {
        $this->cartService->remove($id);

        return redirect('/carts');
    }

    public function postCart(Request $request )
    {
        $this->cartService->postCart($request);

        return redirect()->back();
    }

    public function showOrder($id)
    {
        $this->data['title'] = 'Lịch sử đơn mua';
        $user_id= $id;
        $get_order = DB::table('orders')->where('user_id','=',$user_id)->orderby('id','desc')->get();
        // dd($get_order);
        $this->data['getorders'] = $get_order;
        return view('carts.historyorder', $this->data);
    }


    public function showOrderDetail($id){

        $this->data['title'] = 'Chi tiết đơn hàng ';
        $user = DB::table('orders')
        ->select('orders.*')
        ->where('orders.id', '=', $id)
        ->first();

        
        // echo 123;
        $order = DB::table('orders_detail')
            ->join('products', 'orders_detail.product_id', '=', 'products.id')
            ->select('orders_detail.*', 'products.*')
            ->where('orders_detail.order_id', '=', $id) ->get();
        
        // echo '<pre>';
        //     print_r($orderById);
        // echo '</pre>';

        $this->data['user'] = $user;
        $this->data['order'] = $order;
        return view('carts.orderdetail', $this->data);

    }

    public function updateOrderDetail(Request $request, $id){

        // dd($id);
        $order = Order::find($id);
        
        $order->active = $request->input('active');
        // dd($order->active);
        $order->save();

        Session::flash('message', "Successfully updated");
        return redirect()->back();

        
    }

}
