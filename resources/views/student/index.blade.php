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
                                <label>Tên sinh viên</label>
                                <input type="text" value="{{$user_data->student_name}}" required  name="student_name" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label>Địa chỉ của bạn</label>
                                <input type="text" name="address" required value="{{$user_data->address}}" class="form-control">

                            </div>
                        </div>
                    </div>




                    <div>
                        <div class="row">
                            <div class="col-md-4">
                                <label>Khoa</label> : <b>{{$user_data->department_name}}</b>
                            </div>
                            <div class="col-md-4">
                                <label>Ngành</label> : <b> {{$user_data->name_branch}}</b>
                            </div>
                            <div class="col-md-4">
                                <label>Khóa</label>: <b>{{$user_data->name_course}}</b>
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
                <h6 class="panel-title">Cài đặt tài khoản : <b>{{Auth::guard("student")->user()->code}}</b></h6>
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
                                <input type="password" name="now_password" placeholder="Nhập mật khẩu hiện tại của bạn" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Mật khẩu mới</label>
                                <input type="password" name="password" placeholder="Nhập mật khẩu mới" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label>Nhập lại mật khẩu</label>
                                <input type="password" name="password_confirmation" placeholder="Nhập lại mật khẩu mới" class="form-control" required>
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