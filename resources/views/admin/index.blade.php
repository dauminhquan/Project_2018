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
                <form action="#">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Tên của bạn</label>
                                <input type="text" value="{{$user_data->name_admin}}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        {!! csrf_field() !!}
                        <button type="submit" class="btn btn-primary">Save <i class="icon-arrow-right14 position-right"></i></button>
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
                <form action="#">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Mật khẩu hiện tại</label>
                                <input type="password" placeholder="Nhập mật khẩu hiện tại của bạn" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Mật khẩu mới</label>
                                <input type="password" placeholder="Nhập mật khẩu mới" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label>Nhập lại mật khẩu</label>
                                <input type="password" placeholder="Nhập lại mật khẩu mới" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="text-right">
                        {!! csrf_field() !!}
                        <button type="submit" class="btn btn-primary">Lưu <i class="icon-arrow-right14 position-right"></i></button>
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