@extends("layout")
@section("main-content")
    <!-- Basic datatable -->
    <div class="panel panel-flat">
        <div class="panel-heading">

            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>

                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body" id="data-table" >
            <p class="content-group-lg">Lưu ý. Chỉ được chỉnh sửa đợt bảo vệ khi đợt bảo vệ chưa kết thúc</p>


                <data-edit-time time_start="{{$data->timeStart}}" time_end = "{{$data->timeEnd}}" id_p="{{$data->id}}"></data-edit-time>


                <fieldset class="content-group" >
                    <legend class="text-bold">Danh sách topic bảo vệ trong đợt</legend>
                    <data-table id="{{$data->id}} " timeStart="{{$data->timeStart}}"  timeEnd="{{$data->timeEnd}}"></data-table>

                </fieldset>





        </div>
    </div>


    <!-- /basic datatable -->
@endsection
@section("script")
    <script type="text/javascript" src="{{asset("assets/js/plugins/tables/datatables/datatables.min.js")}}"></script>
    <script type="text/javascriExamples of standard form controls suppt" src="{{asset("assets/js/plugins/tables/datatables/extensions/buttons.min.js")}}"></script>
    <script src="{{asset("assets/js/plugins/notifications/sweet_alert.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("assets/js/plugins/forms/selects/select2.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("assets/js/core/app.js")}}"></script>
    <script src="{{asset("js/protectionManageId.js")}}"></script>
    <script src="{{asset("js/buildstudentManage.js")}}"></script>
    {{--<script src="{{asset("js/build_lecturersManage.js")}}"></script>--}}
@endsection