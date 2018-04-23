@extends("layout")
@section("main-content")
    <!-- Simple panel -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Thông tin chủ đề của bạn</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body">
            <h6 class="text-semibold">{{$data->name_topic}} - Giảng viên : {{$data->name_lecturer}}</h6>
            <p class="content-group">{{$data->describe}}</p>

            <h6 class="text-semibold">Tình trạng: Đang đợi phê duyệt</h6>
            <h6 class="text-semibold">Đợt bảo vệ: {{$data->time_start}} - {{$data->time_end}} : 15h:30p Ngày 25/12/2018 Tại phòng A605</h6>
            <h6 class="text-semibold">Danh sách giảng viên phản biện: </h6>
            @if(count($data->listLec) > 0)
                @foreach($data->listLec as $item)
                    <p>{{$item}}</p>
                @endforeach
                @endif
        </div>
    </div>
    <!-- /simple panel -->
@endsection
@section("script")

    <script src="{{asset("assets/js/plugins/notifications/sweet_alert.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("assets/js/core/app.js")}}"></script>

@endsection