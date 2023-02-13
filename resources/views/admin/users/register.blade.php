<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.head')
</head>

<body class="login-page" style="min-height: 500px ; background-image:url(/template/admin/dist/img/background5.webp);">

    <div class="register-box " style="width: 500px;">
        <div class="card  card-outline card-primary">
            
            <div class=" card-header text-center">
                <a href="#" class="h1"><b>Đăng Kí Tài Khoản</b></a>
            </div>
            <!-- /.login-logo -->
            <div class="card-body">
                <div class="card-body login-card-body">

                    @if( count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{$err}}
                            @endforeach
                        </div>
                    @endif 

                    @if(Session::has('thanhcong'))
                        <div class="alert alert-success">{{Session::get('thanhcong')}}</div>
                    @endif
                    <!-- <p class="login-box-msg">Sign in to start your session</p> -->
                    <!-- @include('admin.alert') -->
                    <form action="/register/account" method="post">
                        <div class="input-group mb-3">
                                <input type="text" name="full_name" class="form-control" placeholder="Họ tên ">
                        </div>


                        <div class="input-group mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Email">
                            
                        </div>

                        <div class="input-group mb-3">
                                <input type="text" name="address" class="form-control" placeholder="Địa chỉ ">
                                
                        </div>

                        <div class="input-group mb-3">
                                <input type="text" name="phone" class="form-control" placeholder="Số điện thoại">
                                
                        </div>

                        <div class="input-group mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Mật khẩu">
                            
                        </div>

                        <div class="input-group mb-3">
                            <input type="re_password" name="re_password" class="form-control" placeholder="Nhập lại mật khẩu">
                            
                        </div>


                        

                        <input type="submit" value="Đăng Kí" class="btn btn-pill text-white btn-block btn-primary">








                        <p class="text-center">Đã tạo tài khoản? <a href="login">Đăng nhập</a></p>
                        <!-- <span class="d-block text-center my-4 text-muted"> or sign in with</span> -->

                        <!-- <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a> -->


                        <div class="social-login justify-content-center row">
                            <a href="#" class="fab fa-facebook-f d-flex align-items-center justify-content-center mr-2" style="background: #3b5998; text-decoration: none; position: relative; text-align: center; color: #fff; mmargin-bottom: 10px; width: 40px; height: 40px; border-radius: 50%; display: inline-block;">
                                <span class="icon-facebook "></span>
                            </a>
                            <a href="#" class="twitter">
                                <span class="fab fa-twitter d-flex align-items-center justify-content-center mr-2" style="background: #1da1f2; text-decoration: none; position: relative; text-align: center; color: #fff; mmargin-bottom: 10px; width: 40px; height: 40px; border-radius: 50%; display: inline-block;"></span>
                            </a>
                            <a href="#" class="google">
                                <span class="fab fa-google d-flex align-items-center justify-content-center mr-2" style="background: #ea4335; text-decoration: none; position: relative; text-align: center; color: #fff; mmargin-bottom: 10px; width: 40px; height: 40px; border-radius: 50%; display: inline-block;"></span>
                            </a>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>


    </div>
    <!-- /.login-box -->
    @include('admin.footer')

</body>

</html>