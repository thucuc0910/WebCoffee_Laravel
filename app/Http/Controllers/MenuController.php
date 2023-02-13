<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Menu\MenuService;
use App\Http\Services\Slider\SliderService;
use App\Models\Menu;
use Illuminate\Support\Facades\DB;
class MenuController extends Controller
{
    


    protected $menuService;

    public function __construct(MenuService $menuService )
    {
        
        $this->menuService = $menuService;
    }

    public function index(Request $request, $id, $slug = '') 
    {

            $menu = $this->menuService->getId($id);

        // dd($menu);
        // dd('$menu.parent_id'); 

        $products = $this->menuService->getProduct($menu, $request);
        // dd($products);
        return view('menu', [
            'title' => $menu->name,
            'products' => $products,
            'menu'  => $menu
        ]);
    }

    public function discountProduct() 
    {
        $get_product = DB::table('products')->where('price_sale','!=', Null)->orderby('id','desc')->get();
        return view('products.discount', [
            'title' => 'Khuyến Mãi',
            'products' => $get_product
        ]);
    }

    public function contact()
    {
        return view('contact', [
            'title' => 'Liên hệ',
        ]);
    }

    
}