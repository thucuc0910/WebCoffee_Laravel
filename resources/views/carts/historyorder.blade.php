@extends('main')

@section('content')


<div class="container" style=" margin-top:100px">
    <table class="table">
        <thead>
            <tr>
                <!-- <th style="width: 50px">ID</th> -->
                <th>Mã đơn hàng</th>
                <th>Số Điện Thoại</th>
                <th>Tổng tiền</th>
                <th>Email</th>
                <th>Tình trạng</th>
                <th>Ngày Đặt hàng</th>
                <th style="width: 100px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach($getorders as $key => $order)
            <tr>
                <td style="padding-top:25px;">{{ $order->id }}</td>
                <!-- <td>{{ $order->full_name }}</td> -->
                <td style="padding-top:25px;">{{ $order->phone }}</td>
                <td style="padding-top:25px;">{{ number_format($order->total) }}VNĐ</td>

                <td style="padding-top:25px;">{{ $order->email }}</td>
                <td style="padding-top:25px;">
                    @if( $order->active == 1)
                    <p>Chờ xử lý</p>
                    @elseif( $order->active == 2 )
                    <p>Đang được giao</p>
                    @elseif( $order->active == 3 )
                    <p>Hoàn thành</p>
                    @elseif( $order->active == 0 )
                    <p>Đã bị huỷ</p>
                    @endif
                </td>
                <td style="padding-top:25px;">{{ $order->created_at }}</td>

                <td>
                    <a style="font-size:15px; width:40px; height:40px " class="btn btn-primary btn-sm" href="/history/orderdetail/{{$order->id}}">
                        <i class="fas fa-eye"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>


@endsection