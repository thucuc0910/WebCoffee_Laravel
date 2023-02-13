@extends('main')

@section('content')
<form class="bg0 p-t-130 p-b-85"  method="post">
    @include('admin.alert')

    @if (count($products) != 0)
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-10 m-lr-auto m-b-50">
                <div class="m-l-25 m-r--38 m-lr-0-xl">
                    <div class="wrap-table-shopping-cart">
                        @php $total = 0; @endphp
                        <table class="table-shopping-cart ">
                            <tbody>
                                <tr class="table_head">
                                    <th class="column-1 " style="width: 200px;">Sản phẩm</th>
                                    <th class="column-2 ">Hình ảnh</th>
                                    <th class="column-3 ">Giá</th>
                                    <th class="column-4 " style="width: 200px;">Số lượng</th>
                                    <th class="column-5 " style="width: 150px;">Tổng</th>
                                    <th class="column-6 ">&nbsp;</th>
                                </tr>

                                @foreach($products as $key => $product)
                                    @php
                                        $price = $product->price_sale != 0 ? $product->price_sale : $product->price;
                                        $priceEnd = $price * $carts[$product->id];
                                        $total += $priceEnd;
                                    @endphp
                                    <tr class="table_row">
                                        <td class="column-1">{{ $product->name }}
                                            
                                        </td>
                                        <td class="column-2">
                                            <div class="how-itemcart1" style="margin-left: 50px;" >
                                                <img style="text-align: center; position: display" src="{{ $product->thumb }}" alt="IMG">
                                            </div>
                                        </td>
                                        <td class="column-3">{{ number_format($price, 0, '', '.') }}đ</td>
                                        <td class="column-4" >
                                            <div class="wrap-num-product flex-w m-l-auto m-r-0" style="margin-right: 20px;">
                                                <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                    <i class="fs-16 zmdi zmdi-minus"></i>
                                                </div>

                                                <input class="mtext-104 cl3 txt-center num-product" type="number" name="num_product[{{ $product->id }}]" value="{{ $carts[$product->id] }}">

                                                <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                    <i class="fs-16 zmdi zmdi-plus"></i>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="column-5">{{ number_format($priceEnd, 0, '', '.') }}đ</td>
                                        <td class="p-r-15">
                                            <a href="/carts/delete/{{ $product->id }}">Xóa</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                        <div class="flex-w flex-m m-r-20 m-tb-5" style="font-weight: bold; color:brown ;font-size:18px;">
                         Tổng tiền:  {{ number_format($total, 0, '', '.') }}đ   
                        </div>

                        <!-- <input type="submit" value="Cập nhật" formaction="/update-cart" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                        @csrf -->
                    </div>

                    <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                        <div class="flex-w flex-m m-r-20 m-tb-5 row">
                            <input class="stext-104 cl2 plh4  bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" placeholder="Mã Voucher">

                            <div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
                                Áp dụng Voucher
                            </div>
                        </div>

                        <input type="submit" value="Cập nhật" formaction="/update-cart" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">

                        <input type="submit" value="Thanh toán" formaction="/checkout-cart" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                        @csrf
                    </div>
                    
                </div>
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