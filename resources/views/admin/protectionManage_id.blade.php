@extends("layout")
@section("main-content")
    <!-- Basic datatable -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Basic form inputs</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body">
            <p class="content-group-lg">Lưu ý. Chỉ được chỉnh sửa đợt bảo vệ khi đợt bảo vệ chưa kết thúc</p>

            <form class="form-horizontal" id="form_infor" action="#">
                <fieldset class="content-group">
                    <legend class="text-bold">Thông tin về đợt bảo về</legend>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Thời gian bắt đầu</label>
                        <div class="col-lg-10">
                            <input type="date" value="{{$data->timeStart}}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-2">Thời gian kết thúc</label>
                        <div class="col-lg-10">
                            <input type="date" value="{{$data->timeEnd}}" class="form-control">
                        </div>
                    </div>


                </fieldset>


                <fieldset class="content-group" id="data-table">
                    <legend class="text-bold">Danh sách topic bảo vệ trong đợt</legend>
                    <data-table id="{{$data->id}}"></data-table>

                </fieldset>



                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Lưu <i class="icon-arrow-right14 position-right"></i></button>
                </div>
            </form>
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