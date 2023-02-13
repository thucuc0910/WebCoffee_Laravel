@extends('admin.main')
@section('content')
<section class="content-header">
    <h1 style="text-align: center; font-weight: bold;">
        CHI TIẾT ĐƠN HÀNG
    </h1>
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <div class="row">
                <div class="col-md-12">
                    <div class="container123  col-md-6">
                        <h4></h4>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="text-align: center; font-weight: bold;" colspan="3" class="col-md-4">Thông tin khách hàng</th>
                                    <!-- <th class="col-md-6"></th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Thông tin người đặt hàng</td>
                                    <td>{{ $customerInfo->full_name }}</td>
                                </tr>
                                <tr>
                                    <td>Ngày đặt hàng</td>
                                    <td>{{ $customerInfo->created_at }}</td>
                                </tr>
                                <tr>
                                    <td>Số điện thoại</td>
                                    <td>{{ $customerInfo->phone }}</td>
                                </tr>
                                <tr>
                                    <td>Địa chỉ</td>
                                    <td>{{ $customerInfo->address }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{ $customerInfo->email }}</td>
                                </tr>
                                <tr>
                                    <td>Ghi chú</td>
                                    <td>{{ $customerInfo->content }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="container123  col-md-12">
                        <table id="myTable" tyle="margin: 0px 10px 0px 10px;" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting col-md-1">STT</th>
                                    <th class="sorting_asc col-md-4">Tên sản phẩm</th>
                                    <th class="sorting col-md-2">Hình ảnh</th>
                                    <th class="sorting col-md-2">Số lượng</th>
                                    <th class="sorting col-md-2">Giá tiền</th>
                            </thead>
                            <tbody>
                                @foreach($orderById as $key => $bill)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $bill-> name }}</td>
                                    <td><a href="{{  $bill->thumb }}" target="_blank">
                                            <img src="{{ $bill->thumb }}" height="40px">
                                        </a>
                                    </td>
                                    <td>{{ $bill->qty }}</td>
                                    <td>{{ number_format($bill->price) }} VNĐ</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="3"><b>Tổng tiền</b></td>
                                    <td colspan="2"><b class="text-red">{{ number_format($customerInfo->total) }} VNĐ</b></td>
                                </tr>
                                <tr>
                                    <td colspan="3"><b>Trạng thái đơn hàng</b></td>
                                    <td colspan="3"><b class="text-red">
                                        @if( $customerInfo->active == 1)
                                            <p>Chờ xử lý</p>
                                        @elseif( $customerInfo->active == 2 )
                                            <p>Đang được giao</p>
                                        @elseif( $customerInfo->active == 3 )
                                            <p>Hoàn thành</p>
                                        @elseif( $customerInfo->active == 0 )
                                            <p>Đã bị huỷ</p>
                                        @endif
                                    </b></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
            <div class="col-md-12" style="margin-bottom: 50px;">
                <form action="" method="post">
                    <!-- <input type="hidden" name="_method" value="post"> -->
                    {{ csrf_field() }}
                    <div class="col-md-8"></div>
                    <div class="col-md-4">
                        <div class="form-inline">
                            @if( $customerInfo->active == 1)
                                <label style="margin-bottom: 10px;">Trạng thái giao hàng: </label>
                                
                                <select name="active" class="form-control input-inline" style="width: 200px; margin-right: 10px;">
                                    <option value="1">Chờ xử lý</option>
                                    <option value="2">Đang giao</option>
                                    <option value="3">Đã giao</option>
                                    <option value="0">Huỷ đơn</option>
                                </select>

                                <input type="submit" value="Xử lý" class="btn btn-primary">
                            @elseif( $customerInfo->active == 2 )
                                <label style="margin-bottom: 10px;">Trạng thái giao hàng: </label>
                                    
                                <select name="active" class="form-control input-inline" style="width: 200px; margin-right: 10px;">
                                    <option value="2">Đang giao</option>
                                    <option value="3">Đã giao</option>
                                </select>

                                <input type="submit" value="Xử lý" class="btn btn-primary">
                            @elseif( $customerInfo->active == 3 )
                                
                            @elseif( $customerInfo->active == 0 )
                                
                            @endif
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection