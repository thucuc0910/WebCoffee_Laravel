<?php


namespace App\Http\Services;




use App\Models\Order;

use App\Models\User;
use App\Models\Product;


use App\Jobs\SendMail;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;



class CartService
{
    protected $table = 'OrderDetail';
    public function create($request)
    {
        $qty = (int)$request->input('num_product');
        $product_id = (int)$request->input('product_id');

        if ($qty <= 0 || $product_id <= 0) {
            Session::flash('error', 'Số lượng hoặc Sản phẩm không chính xác');
            return false;
        }

        $carts = Session::get('carts');
        if (is_null($carts)) {
            Session::put('carts', [
                $product_id => $qty
            ]);
            return true;
        }

        $exists = Arr::exists($carts, $product_id);
        if ($exists) {
            $carts[$product_id] = $carts[$product_id] + $qty;
            Session::put('carts', $carts);
            return true;
        }

        $carts[$product_id] = $qty;
        Session::put('carts', $carts);

        return true;
    }

    public function getProduct()
    {
        $carts = Session::get('carts');
        if (is_null($carts)) return [];

        $productId = array_keys($carts);
        return Product::select('id', 'name', 'price', 'price_sale', 'thumb')
            ->where('active', 1)
            ->whereIn('id', $productId)
            ->get();
    }

    public function update($request)
    {
        Session::put('carts', $request->input('num_product'));

        return true;
    }

    public function remove($id)
    {
        $carts = Session::get('carts');

        unset($carts[$id]);

        Session::put('carts', $carts);
        return true;
    }

    



    public function getProductForCart($user)
    {
        return $user->carts()->with(['product' => function ($query) {
            $query->select('id', 'name', 'thumb');
        }])->get();
    }

    // Post Cart
    public function postCart($request)
    {

        try{
                DB::beginTransaction();

                $total = 0;
                $carts = Session::get('carts');

                $productId = array_keys($carts);
                
                $products = Product::select('id', 'name', 'price', 'price_sale', 'thumb')
                    ->where('active', 1)
                    ->whereIn('id', $productId)
                    ->get();
                
                foreach ($products as $product) {
                    $price = $product->price_sale != 0 ? $product->price_sale : $product->price;
                    $priceEnd = $price * $carts[$product->id];
                    $total += $priceEnd;
                }

                // dd($total);

                $order = new Order;
                $order->user_id = $request->user()->id;
                $order->full_name = $request->full_name;
                $order->phone = $request->phone;
                $order->address = $request->address;
                $order->email = $request->email;
                $order->content = $request->content;
                $order->total = $total;
                $order->active = 1;
                $order->save();


                // dd($products);

                foreach ($products as $product){
                    db::table('orders_detail')->insert([
                        'order_id' => $order->id,
                        'product_id' => $product->id,
                        'qty'   => $carts[$product->id],
                        'price' => $product->price_sale != 0 ? $product->price_sale : $product->price

                    ]);

                }

                DB::commit();
                session()->flash('success', 'Đặt hàng thành công');

                SendMail::dispatch($request->input('email'))->delay(now()->addSeconds(2));


                Session::forget('carts');
            }catch (\Exception $err) {
                DB::rollBack();
                Session::flash('error', 'Đặt Hàng Lỗi, Vui lòng thử lại sau');
                return false;
            }
    
            return true;
       
    }

    public function getUser()
    {
        return User::orderByDesc('id')->paginate(15);
    }



    
}
