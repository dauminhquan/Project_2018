@extends("layout")
@section("main-content")
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
        <div class="panel-body" id="student-topic">
            <h6 class="text-semibold">{{$data->name_topic}} - Giảng viên : {{$data->name_lecturer}}</h6>
            <p class="content-group">{{$data->describe}}</p>
            @if($data->ok == 1)
                <p>Tình trạng: <b>@if($data->acceptance == 0) Đang đợi điểm @elseif($data->acceptance == 1) Hoàn thành @else Đã hủy @endif</b> </p>
                @if(!isset($data->time_start) || !isset($data->time_end))
                    <protection></protection>
                @elseif($data->acceptance == 0)
                    <p>Đợt bảo vệ: <b>{{date('d/m/Y',strtotime($data->time_start))}}</b> - <b>{{date('d/m/Y',strtotime($data->time_end))}}</b> </p>
                    <p>Thời gian bắt đầu: <b>{{date('d/m/Y H:i',strtotime($data->time_run))}}</b></p>
                    <p> Tại: <b>{{$data->place}}</b> </p>
                    <p>Danh sách giảng viên phản biện: @if(count($data->listLec) > 0)
                            @foreach($data->listLec as $item)
                                <b>{{$item}}</b>,
                            @endforeach
                        @endif </p>
                @else
                    <p>Điểm số: <b>{{$data->scores}}</b> </p>
                    <p>Tình trạng: <b>@if($data->pass == 0) Không qua @else Qua môn @endif </b> </p>
                    <p>Danh sách giảng viên phản biện: @if(count($data->listLec) > 0)
                            @foreach($data->listLec as $item)
                                <b>{{$item}}</b>,
                            @endforeach
                        @endif </p>
                @endif

            @else
                Chủ đề của bạn đang đợi giảng viên chấp nhận hướng dẫn
            @endif
        </div>
    </div>
@endsection
@section("script")

    <script src="{{asset("assets/js/plugins/notifications/sweet_alert.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("assets/js/core/app.js")}}"></script>
    <script type="text/javascript" src="{{asset("js/student/topic.js")}}"></script>
@endsection