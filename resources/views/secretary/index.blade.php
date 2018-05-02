@extends("layout")
@section("main-content")
    <!-- Main content -->
    <div class="">


        <!-- Profile info -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h6 class="panel-title">Thông tin cá nhân</h6>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">
                <form method="post">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Tên quản trị viên</label>
                                <input type="text" value="{{$user_data->name_secretary}}" name="name_secretary" required  class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label>Địa chỉ của bạn</label>
                                <input type="text" value="{{$user_data->address_secretary}}" name="address_secretary" required class="form-control">

                            </div>
                        </div>
                    </div>




                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Email</label>
                                <input type="text" value="{{$user_data->email_address_secretary}}" name="email_address_secretary" required class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label>Số điện thoại</label>
                                <input type="text" value="{{$user_data->phone_number}}" required name="phone_number" class="form-control">

                            </div>
                        </div>
                    </div>


                    <div class="text-right">
                        {!! csrf_field() !!}
                        <button type="submit" name="update_info" class="btn btn-primary">Lưu <i class="icon-arrow-right14 position-right"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /profile info -->


        <!-- Account settings -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h6 class="panel-title">Cài đặt tài khoản : <b>{{Auth::guard("employ")->user()->username}}</b></h6>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">
                <form method="post">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Mật khẩu hiện tại</label>
                                <input type="password" name="now_password" required placeholder="Nhập mật khẩu hiện tại của bạn" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Mật khẩu mới</label>
                                <input type="password" name="password" required placeholder="Nhập mật khẩu mới" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label>Nhập lại mật khẩu</label>
                                <input type="password" name="password_confirmation" required placeholder="Nhập lại mật khẩu mới" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="text-right">
                        {!! csrf_field() !!}
                        <button type="submit" name="updateauth" class="btn btn-primary">Lưu <i class="icon-arrow-right14 position-right"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /account settings -->
    </div>
    <!-- /main content -->
@endsection
@section("script")

    <script src="{{asset("assets/js/plugins/notifications/sweet_alert.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("assets/js/core/app.js")}}"></script>

@endsection