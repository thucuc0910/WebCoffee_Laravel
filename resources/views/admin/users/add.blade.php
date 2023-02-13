@extends('admin.main')

@section('head')
    <script src="/public/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
<form action="" method="POST" >
    <div class="card-body">
        <div class="form-group">
          <label for="user">Tên người dùng</label>
          <input type="text" name="full_name" class="form-control" placeholder="Nhập tên nhân viên">
        </div>

        <div class="form-group">
          <label for="phone">Số điện thoại</label>
          <input type="text" name="phone" class="form-control" placeholder="Nhập số điện thoại">
        </div>

        <div class="form-group">
          <label for="address">Địa chỉ</label>
          <input type="text" name="address" class="form-control" placeholder="Nhập địa chỉ">
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" name="email" class="form-control" placeholder="Nhập email">
        </div>

        <div class="form-group">
          <label for="password">Mật khẩu</label>
          <input type="text" name="password" class="form-control" placeholder="Nhập password">
        </div>

        <div class="form-group">
          <label>Loại</label>
          <select class="form-control" name="level">
              <option value="0">Quản trị</option>
              <option value="1">Người dùng</option>        
              {{-- @foreach ($menus as $menu)
                  <option value="{{ $menu->id}}">{{ $menu->name }}</option>
              @endforeach --}}
          </select>
        </div>

        {{-- <div class="form-group">
          <label>Kích hoạt</label>
         
            <div class="custom-control custom-radio">
              <input class="custom-control-input" value="1" type="radio" id="active" name="active">
              <label for="active" class="custom-control-label">Có</label>
            </div>

            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="0" type="radio" id="no_active" name="active">
                <label for="no_active" class="custom-control-label">Không</label>
              </div>           
          </div> --}}
      </div>

     
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Thêm nhân viên</button>
    </div>
    @csrf
  </form>
@endsection

@section('footer')
  <script>
    CKEDITOR.replace('content');
  </script>
@endsection