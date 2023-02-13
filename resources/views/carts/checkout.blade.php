@extends('main')

@section('content')
<form action="/carts/checkout" class="bg0 p-t-130 p-b-85" method="post" >
    @include('admin.alert')

    @if (count($products) != 0)


    <h2 style="text-align: center ; font-weight: bold; margin: 20px 0px 20px 0; color:brown">THÔNG TIN ĐƠN HÀNG</h2>

    <div class="row">


        <div style="margin-left:160px;">
            <div class="m-l-5 m-lr-0-xl " style="width:600px; ">
                <div class="wrap-table-shopping-cart-checkout">
                    @php $total = 0; @endphp
                    <table class="table-shopping-cart-checkout">
                        <tbody>
                            <tr class="table_head-checkout">
                                <th class="column-1">Sản phẩm</th>
                                <th class="column-2">Giá</th>
                                <th class="column-3">Số lượng</th>
                                <th class="column-4">Tổng</th>

                            </tr>

                            @foreach($products as $key => $product)
                                @php
                                    $price = $product->price_sale != 0 ? $product->price_sale : $product->price;
                                    $priceEnd = $price * $carts[$product->id];
                                    $total += $priceEnd;
                                @endphp
                            <tr class="table_row-checkout">

                                <td class="column-1">{{ $product->name }}</td>
                                <td class="column-2">{{ number_format($price, 0, '', '.') }}đ</td>
                                <td class="column-3" name="num_product[{{ $product->id }}]">
                                    {{ $carts[$product->id] }}

                                </td>
                                <td class="column-4">{{ number_format($priceEnd, 0, '', '.') }}đ</td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                    <div class="flex-w flex-m m-r-20 m-tb-5" style="font-weight: bold; color:brown ;font-size:18px;">
                        Tổng tiền: {{ number_format($total, 0, '', '.') }}đ
                    </div>

                    
                        @csrf
                </div>

                
            </div>
        </div>



        <div class="col-sm-5 col-lg-7 col-xl-5" style="margin-left:0px; padding-right:500px">
            <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-5 m-lr-0-xl m-l-500" style="width:600px;    ">
                <h4 class="mtext-109 cl2 p-b-30" style="text-align: center ; font-weight: bold;">
                    THÔNG TIN KHÁCH HÀNG
                </h4>

                <div class=" bor12 p-t-15 p-b-30">


                    <div class="size-100 p-r-18 p-r-0-sm w-full-ssm">


                        <div class="p-t-15">

                            @csrf

                            <!-- <p>{{Auth::user()->id}}</p> -->
                            <p> Họ và tên:</p>
                            <div class=" bg0 m-b-12">

                                <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="full_name" value="{{Auth::user()->full_name}}" required>

                            </div>

                            <p> Số điện thoại:</p>
                            <div class=" bg0 m-b-12">

                                <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="phone" value="{{Auth::user()->phone}}">


                            </div>

                            <p> Địa chỉ giao hành:</p>
                            <div class=" bg0 m-b-12">
                                <input class="stext-111   size-111 p-lr-15 p-lr-15" type="text" name="address" value="{{Auth::user()->address}}">


                            </div>

                            <p>Email:</p>
                            <div class=" bg0 m-b-12">
                                <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="email" value="{{Auth::user()->email}}">

                            </div>

                            <p>Ghi chú:</p>
                            <div class="bor8 bg0 m-b-12">
                                <textarea class="cl8 plh3 size-111 p-lr-15" name="content">{{Auth::user()->content}}</textarea>

                            </div>

                        </div>
                    </div>
                </div>

                <button type="submit"  class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                    Đặt Hàng
                </button>
            </div>
        </div>
    </div>

</form>
@else
<div class="text-center">
    <h2>Giỏ hàng trống</h2>
</div>
@endif
@endsection