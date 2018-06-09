@extends("layout")
@section("main-content")
    <!-- Stacked columns -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Bảng thống kê</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a href="{{route('statistical.excel')}}" target="_blank" class="btn btn-info">Tải xuống Excel thống kê</a></li>
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Khoa</th>
                        <th>Số sinh viên đăng ký khóa luận</th>
                        <th>Số sinh viên đăng ký bảo vệ</th>
                        <th>Số SV qua</th>
                        <th>Điểm trung bình</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->department_name}}</td>
                            <td>{{$item->sv_dangky}}</td>
                            <td>{{$item->sv_dangkybv}}</td>
                            <td>{{$item->sv_pass}}</td>
                            <td>{{$item->dtb}}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /stacked columns -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Biểu đồ thống kê</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body">
            <div class="chart-container">
                <div class="chart has-fixed-height" id="stacked_columns"></div>
            </div>
        </div>
    </div>
@endsection
@section("script")
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
    <script type="text/javascript" src="{{asset("assets/js/plugins/visualization/echarts/echarts.js")}}"></script>
    <script src="{{asset("assets/js/plugins/notifications/sweet_alert.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("assets/js/charts/echarts/columns_waterfalls.js")}}"></script>
    <script type="text/javascript" src="{{asset("assets/js/charts/echarts/timeline_option.js")}}"></script>
    <script type="text/javascript" src="{{asset("assets/js/core/app.js")}}"></script>

@endsection